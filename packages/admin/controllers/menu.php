<?php

defined('DS') or exit('No direct access.');



class Admin_Menu_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('before', 'csrf|throttle:60,1');
    }

    public function action_index()
    {
        $search = Input::get('s');

        $data = [];

        $query_menus = Menu::with([]);

        if (!empty($search)) {
            $query_menus = $query_menus->where('name', 'like', '%' . $search . '%');
        }

        $menus = Helper::pagination($query_menus, 50);

        $data = array_merge($data, $menus);

        return View::make('admin::menu.index', $data);

    }

    public function action_create()
    {

        $data = [];

        $labels = Label::with([])->get();

        $data['labels'] = $labels;

        return View::make('admin::menu.create', $data);

    }

    public function action_store()
    {

        if (Request::method() == 'POST') {

            $input = Input::all();

            $rules = [
                'name' => 'required',
                'slug' => 'unique:menus,slug',
                'label' => 'required',
            ];

            $validation = Validator::make($input, $rules);

            if ($validation->fails()) {

                return Redirect::back()->with_errors($validation)->with_input();

            }

            $data_store = [];

            $data_store['name'] = $input['name'];
            $data_store['slug'] = $input['slug'] ? Str::slug($input['slug']) : Str::slug($input['name']);
            $data_store['label_id'] = $input['label'];
            $data_store['icon'] = $input['icon'];
            $data_store['description'] = $input['description'] ?: null;
            $data_store['created_at'] = now();
            $data_store['updated_at'] = now();

            DB::pdo()->beginTransaction();

            try {

                $menu_id = DB::table('menus')->insert_get_id($data_store);

                DB::pdo()->commit();

                return Redirect::to_route('admin-menu-edit', [$menu_id])->with('success', 'menu created successfully!');

            } catch (Exception $e) {

                DB::pdo()->rollBack();
                Log::error($e->getMessage());

                return Redirect::back()->with('error', 'Something went wrong!');

            }

        } else {

            return View::make('error.404');

        }

    }

    public function action_edit($id)
    {

        $data = [];

        $menu = Menu::with([])->where_in('id', [$id])->first();

        if (!$menu) {

            return Redirect::back()->with('error', 'menu not found!');

        }

        $data['menu'] = $menu;

        $labels = Label::with([])->get();

        $data['labels'] = $labels;

        return View::make('admin::menu.edit', $data);

    }

    public function action_update($id)
    {

        if (Request::method() == 'PUT') {

            $menu = Menu::with([])->where_in('id', [$id])->first();

            if (!$menu) {

                return Redirect::back()->with('error', 'menu not found!');

            }

            $menu_id = $menu->id;

            $input = Input::all();

            $rules = [
                'name' => 'required',
                'label' => 'required',
            ];

            $validation = Validator::make($input, $rules);

            if ($validation->fails()) {

                return Redirect::back()->with_errors($validation)->with_input();

            }

            DB::pdo()->beginTransaction();

            try {

                $data_update = [];

                $data_update['name'] = $input['name'];
                $data_update['slug'] = $input['slug'] ? Str::slug($input['slug']) : Str::slug($input['name']);
                $data_update['label_id'] = $input['label'];
                $data_update['icon'] = $input['icon'];
                $data_update['description'] = $input['description'] ?: null;
                $data_update['updated_at'] = now();

                Menu::where_in('id', [$menu_id])->update($data_update);

                DB::pdo()->commit();

                return Redirect::to_route('admin-menu-edit', [$menu_id])->with('success', 'menu updated successfully!');

            } catch (\Exception $e) {

                DB::pdo()->rollBack();
                Log::error($e->getMessage());

                return Redirect::back()->with('error', 'Something went wrong!');

            }

        } else {

            return View::make('error.404');

        }

    }

    public function action_destroy($id)
    {

        if (Request::method() == 'DELETE') {

            $menu = Menu::with([])->where_in('id', [$id])->first();

            if (!$menu) {

                return Redirect::back()->with('error', 'menu not found!');

            }

            $menu_id = $menu->id;

            DB::pdo()->beginTransaction();

            try {

                Menu::where_in('id', [$menu_id])->delete();

                $permissions = Permission::where_in('menu_id', [$menu_id])->count();

                if ($permissions) {

                    Permission::where_in('menu_id', [$menu_id])->delete();

                }

                DB::pdo()->commit();

                return Redirect::to_route('admin-menu')->with('success', 'menu deleted successfully!');

            } catch (\Exception $e) {

                DB::pdo()->rollBack();
                Log::error($e->getMessage());

                return Redirect::back()->with('error', 'Something went wrong!');

            }

        } else {

            return View::make('error.404');

        }

    }
}
