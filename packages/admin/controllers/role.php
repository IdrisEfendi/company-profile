<?php

defined('DS') or exit('No direct access.');



class Admin_Role_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('before', 'csrf|throttle:60,1');
    }

    public function action_index()
    {
        $search = Input::get('s');

        $data = [];

        $query_roles = Role::with(['users']);

        if (!empty($search)) {
            $query_roles = $query_roles->where('name', 'like', '%' . $search . '%');
        }

        $roles = Helper::pagination($query_roles, 50);

        $data = array_merge($data, $roles);

        return View::make('admin::role.index', $data);

    }

    public function action_create()
    {

        $data = [];

        return View::make('admin::role.create', $data);

    }

    public function action_store()
    {

        if (Request::method() == 'POST') {

            $input = Input::all();

            $rules = [
                'name' => 'required',
                'slug' => 'unique:roles,slug',
            ];

            $validation = Validator::make($input, $rules);

            if ($validation->fails()) {

                return Redirect::back()->with_errors($validation)->with_input();

            }

            $data_store = [];

            $data_store['name'] = $input['name'];
            $data_store['slug'] = $input['slug'] ? Str::slug($input['slug']) : Str::slug($input['name']);
            $data_store['count'] = 0;
            $data_store['description'] = $input['description'] ?: null;
            $data_store['created_at'] = now();
            $data_store['updated_at'] = now();

            DB::pdo()->beginTransaction();

            try {

                $role_id = DB::table('roles')->insert_get_id($data_store);

                DB::pdo()->commit();

                return Redirect::to_route('admin-role-edit', [$role_id])->with('success', 'Role created successfully!');

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

        $role = Role::with(['users'])->where_in('roles.id', [$id])->first();

        if (!$role) {

            return Redirect::back()->with('error', 'Role not found!');

        }

        $data['role'] = $role;

        return View::make('admin::role.edit', $data);

    }

    public function action_update($id)
    {

        if (Request::method() == 'PUT') {

            $role = Role::with(['users'])->where_in('roles.id', [$id])->first();

            if (!$role) {

                return Redirect::back()->with('error', 'Role not found!');

            }

            $role_id = $role->id;

            $input = Input::all();

            $rules = [
                'name' => 'required',
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
                $data_update['count'] = DB::table('users')->where_in('role_id', [$role_id])->count();
                $data_update['description'] = $input['description'] ?: null;
                $data_update['updated_at'] = now();

                Role::where_in('id', [$role_id])->update($data_update);

                DB::pdo()->commit();

                return Redirect::to_route('admin-role-edit', [$role_id])->with('success', 'Role updated successfully!');

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

            $role = Role::with(['users'])->where_in('roles.id', [$id])->first();

            if (!$role) {

                return Redirect::back()->with('error', 'Role not found!');

            }

            $role_id = $role->id;

            DB::pdo()->beginTransaction();

            try {

                Role::where_in('id', [$role_id])->delete();

                $permissions = Permission::where_in('role_id', [$role_id])->count();

                if ($permissions) {

                    Permission::where_in('role_id', [$role_id])->delete();

                }

                DB::pdo()->commit();

                return Redirect::to_route('admin-role')->with('success', 'Role deleted successfully!');

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
