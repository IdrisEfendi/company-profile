<?php

defined('DS') or exit('No direct access.');

class Main_Controller extends Controller
{
    protected $themeCookie = 'theme';

    public function __construct()
    {
        $this->middleware('before', 'csrf');
    }

    public function action_index()
    {
        $data = [];
        $data['articles'] = $this->publishedArticlesQuery()
            ->order_by('published_at', 'desc')
            ->order_by('id', 'desc')
            ->take(3)
            ->get();

        return View::make('index', $data);
    }

    public function action_profile()
    {
        return View::make('profile', []);
    }

    public function action_services()
    {
        return View::make('services', []);
    }

    public function action_contact()
    {
        return View::make('contact', []);
    }

    public function action_articles()
    {
        $search = trim(Input::get('s') ?? '');

        $query_articles = $this->publishedArticlesQuery()
            ->order_by('published_at', 'desc')
            ->order_by('id', 'desc');

        if ($search) {
            $keyword = '%' . $search . '%';
            $query_articles = $query_articles->raw_where('(title LIKE ? OR slug LIKE ? OR excerpt LIKE ? OR content LIKE ?)', [
                $keyword,
                $keyword,
                $keyword,
                $keyword,
            ]);
        }

        $articles = Helper::pagination($query_articles, 9);
        $articles['search'] = $search;

        return View::make('articles', $articles);
    }

    public function action_article($slug)
    {
        $article = $this->publishedArticlesQuery()
            ->where('slug', '=', $slug)
            ->first();

        if (!$article) {
            return View::make('error.404');
        }

        $related_articles = $this->publishedArticlesQuery()
            ->where('id', '!=', $article->id)
            ->order_by('published_at', 'desc')
            ->order_by('id', 'desc')
            ->take(3)
            ->get();

        return View::make('article', [
            'article' => $article,
            'related_articles' => $related_articles,
        ]);
    }

    public function action_sitemap()
    {
        $urls = [
            ['loc' => url('/'), 'lastmod' => date('c')],
            ['loc' => url('profil'), 'lastmod' => date('c')],
            ['loc' => url('layanan'), 'lastmod' => date('c')],
            ['loc' => url('kontak'), 'lastmod' => date('c')],
            ['loc' => url('artikel'), 'lastmod' => date('c')],
        ];

        $articles = $this->publishedArticlesQuery()
            ->order_by('updated_at', 'desc')
            ->get();

        foreach ($articles as $article) {
            $lastmod = $article->updated_at ?: ($article->published_at ?: $article->created_at);
            $urls[] = [
                'loc' => url('artikel/' . $article->slug),
                'lastmod' => date('c', strtotime($lastmod)),
            ];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($urls as $item) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . htmlspecialchars($item['loc'], ENT_XML1, 'UTF-8') . '</loc>' . PHP_EOL;
            $xml .= '    <lastmod>' . htmlspecialchars($item['lastmod'], ENT_XML1, 'UTF-8') . '</lastmod>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        $xml .= '</urlset>';

        return Response::make($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    public function action_theme($mode = 'light')
    {
        $theme = strtolower((string) $mode) === 'dark' ? 'dark' : 'light';

        Cookie::forever($this->themeCookie, $theme);

        return Redirect::back();
    }

    protected function publishedArticlesQuery()
    {
        return DB::table('articles')
            ->where('status', '=', 'published')
            ->where('is_active', '=', 1)
            ->raw_where('(published_at IS NULL OR published_at <= ?)', [date('Y-m-d H:i:s')]);
    }
}
