<?php

defined('DS') or exit('No direct access.');

class Admin_Article_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('before', 'csrf|throttle:60,1');
    }

    public function action_index()
    {
        $search = Input::get('s');
        $status = Input::get('status');
        $data = [];

        $query_articles = Article::with(['media'])->order_by('created_at', 'desc')->order_by('id', 'desc');

        if (in_array($status, ['draft', 'published'])) {
            $query_articles = $query_articles->where('status', '=', $status);
        }

        if (!empty($search)) {
            $keyword = '%' . $search . '%';
            $query_articles = $query_articles->raw_where('(title LIKE ? OR slug LIKE ? OR excerpt LIKE ?)', [
                $keyword,
                $keyword,
                $keyword,
            ]);
        }

        $articles = Helper::pagination($query_articles, 50);
        $data = array_merge($data, $articles);
        $data['status'] = $status;

        return View::make('admin::article.index', $data);
    }

    public function action_create()
    {
        return View::make('admin::article.create', []);
    }

    public function action_store()
    {
        if (Request::method() != 'POST') {
            return View::make('error.404');
        }

        $input = Input::all();

        $rules = [
            'title' => 'required',
            'content' => 'required',
            'slug' => 'unique:articles,slug',
        ];

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Redirect::back()->with_errors($validation)->with_input();
        }

        $data_store = $this->payload($input);
        $data_store['created_at'] = now();
        $data_store['updated_at'] = now();

        DB::pdo()->beginTransaction();

        try {
            $article_id = DB::table('articles')->insert_get_id($data_store);

            DB::pdo()->commit();

            return Redirect::to_route('admin-article-edit', [$article_id])->with('success', 'Artikel berhasil dibuat!');
        } catch (\Exception $e) {
            DB::pdo()->rollBack();
            Log::error($e->getMessage());

            return Redirect::back()->with('error', 'Something went wrong!')->with_input();
        }
    }

    public function action_edit($id)
    {
        $article = Article::with(['media'])->where_in('id', [$id])->first();

        if (!$article) {
            return Redirect::back()->with('error', 'Artikel tidak ditemukan!');
        }

        return View::make('admin::article.edit', ['article' => $article]);
    }

    public function action_preview($id)
    {
        $article = DB::table('articles')->where('id', '=', $id)->first();

        if (!$article) {
            return View::make('error.404');
        }

        $related_articles = DB::table('articles')
            ->where('status', '=', 'published')
            ->where('is_active', '=', 1)
            ->raw_where('(published_at IS NULL OR published_at <= ?)', [date('Y-m-d H:i:s')])
            ->where('id', '!=', $article->id)
            ->order_by('published_at', 'desc')
            ->order_by('id', 'desc')
            ->take(3)
            ->get();

        return View::make('article', [
            'article' => $article,
            'related_articles' => $related_articles,
            'is_preview' => true,
        ]);
    }

    public function action_update($id)
    {
        if (Request::method() != 'PUT') {
            return View::make('error.404');
        }

        $article = Article::with([])->where_in('id', [$id])->first();

        if (!$article) {
            return Redirect::back()->with('error', 'Artikel tidak ditemukan!');
        }

        $input = Input::all();

        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Redirect::back()->with_errors($validation)->with_input();
        }

        $data_update = $this->payload($input);
        $data_update['updated_at'] = now();

        DB::pdo()->beginTransaction();

        try {
            Article::where_in('id', [$article->id])->update($data_update);

            DB::pdo()->commit();

            return Redirect::to_route('admin-article-edit', [$article->id])->with('success', 'Artikel berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::pdo()->rollBack();
            Log::error($e->getMessage());

            return Redirect::back()->with('error', 'Something went wrong!')->with_input();
        }
    }

    public function action_destroy($id)
    {
        if (Request::method() != 'DELETE') {
            return View::make('error.404');
        }

        $article = Article::with([])->where_in('id', [$id])->first();

        if (!$article) {
            return Redirect::back()->with('error', 'Artikel tidak ditemukan!');
        }

        DB::pdo()->beginTransaction();

        try {
            Article::where_in('id', [$article->id])->delete();

            DB::pdo()->commit();

            return Redirect::to_route('admin-article')->with('success', 'Artikel berhasil dihapus!');
        } catch (\Exception $e) {
            DB::pdo()->rollBack();
            Log::error($e->getMessage());

            return Redirect::back()->with('error', 'Something went wrong!');
        }
    }

    protected function payload($input)
    {
        $title = trim($input['title'] ?? '');
        $slug = trim($input['slug'] ?? '');
        $status = in_array($input['status'] ?? 'draft', ['draft', 'published']) ? $input['status'] : 'draft';
        $published_at = trim($input['published_at'] ?? '');

        return [
            'title' => $title,
            'slug' => $slug ? Str::slug($slug) : Str::slug($title),
            'excerpt' => trim($input['excerpt'] ?? ''),
            'content' => trim($input['content'] ?? ''),
            'image_id' => $input['image'] ?? 0,
            'status' => $status,
            'published_at' => $published_at ? str_replace('T', ' ', $published_at) : null,
            'is_active' => isset($input['is_active']) ? 1 : 0,
        ];
    }
}
