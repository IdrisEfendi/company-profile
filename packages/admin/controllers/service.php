<?php

defined('DS') or exit('No direct access.');

class Admin_Service_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('before', 'csrf|throttle:60,1');
    }

    public function action_index()
    {
        $search = Input::get('s');
        $data = [];

        $query_services = Service::with([])->order_by('sort_order', 'asc')->order_by('id', 'asc');

        if (!empty($search)) {
            $query_services = $query_services->where('title', 'like', '%' . $search . '%');
        }

        $services = Helper::pagination($query_services, 50);
        $data = array_merge($data, $services);

        return View::make('admin::service.index', $data);
    }

    public function action_create()
    {
        return View::make('admin::service.create', []);
    }

    public function action_store()
    {
        if (Request::method() != 'POST') {
            return View::make('error.404');
        }

        $input = Input::all();

        $rules = [
            'title' => 'required',
            'slug' => 'unique:services,slug',
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
            $service_id = DB::table('services')->insert_get_id($data_store);

            DB::pdo()->commit();

            return Redirect::to_route('admin-service-edit', [$service_id])->with('success', 'Layanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::pdo()->rollBack();
            Log::error($e->getMessage());

            return Redirect::back()->with('error', 'Something went wrong!')->with_input();
        }
    }

    public function action_edit($id)
    {
        $service = Service::with([])->where_in('id', [$id])->first();

        if (!$service) {
            return Redirect::back()->with('error', 'Layanan tidak ditemukan!');
        }

        return View::make('admin::service.edit', ['service' => $service]);
    }

    public function action_update($id)
    {
        if (Request::method() != 'PUT') {
            return View::make('error.404');
        }

        $service = Service::with([])->where_in('id', [$id])->first();

        if (!$service) {
            return Redirect::back()->with('error', 'Layanan tidak ditemukan!');
        }

        $input = Input::all();

        $rules = [
            'title' => 'required',
        ];

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Redirect::back()->with_errors($validation)->with_input();
        }

        $data_update = $this->payload($input);
        $data_update['updated_at'] = now();

        DB::pdo()->beginTransaction();

        try {
            Service::where_in('id', [$service->id])->update($data_update);

            DB::pdo()->commit();

            return Redirect::to_route('admin-service-edit', [$service->id])->with('success', 'Layanan berhasil diperbarui!');
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

        $service = Service::with([])->where_in('id', [$id])->first();

        if (!$service) {
            return Redirect::back()->with('error', 'Layanan tidak ditemukan!');
        }

        DB::pdo()->beginTransaction();

        try {
            Service::where_in('id', [$service->id])->delete();

            DB::pdo()->commit();

            return Redirect::to_route('admin-service')->with('success', 'Layanan berhasil dihapus!');
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

        return [
            'title' => $title,
            'slug' => $slug ? Str::slug($slug) : Str::slug($title),
            'description' => trim($input['description'] ?? ''),
            'sort_order' => (int) ($input['sort_order'] ?? 0),
            'is_active' => isset($input['is_active']) ? 1 : 0,
        ];
    }
}
