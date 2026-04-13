<?php

defined('DS') or exit('No direct access.');

class Admin_User_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('before', 'csrf|throttle:60,1');
    }

    public function action_index()
    {
        $search = Input::get('s');

        $data = [];

        $query_users = User::with(['role']);

        if (!empty($search)) {
            $query_users = $query_users->where('name', 'like', '%' . $search . '%');
        }

        $users = Helper::pagination($query_users, 50);

        $data = array_merge($data, $users);

        return View::make('admin::user.index', $data);

    }

    public function action_create()
    {

        $data = [];

        $roles = Role::all();

        $data['roles'] = $roles;

        return View::make('admin::user.create', $data);

    }

    public function action_store()
    {

        if (Request::method() == 'POST') {

            $input = Input::all();

            $rules = [
                'name'  => 'required',
                'username' => 'unique:users,username',
                'email' => 'required|email|unique:users,email',
                'role' => 'required',
                'password' => 'required|min:8',
                'confirm_password' => 'required|min:8|same:password',
            ];

            $validation = Validator::make(Input::all(), $rules);

            if ($validation->fails()) {

                return Redirect::back()->with_errors($validation)->with_input();

            }

            $data_store = [];

            $data_store['name'] = $input['name'];
            $data_store['username'] = $input['username'] ? Str::slug($input['username']) : Str::slug($input['name']);
            $data_store['email'] = $input['email'];
            $data_store['password'] = Hash::make($input['password']);
            $data_store['biodata'] = $input['biodata'] ?: null;
            $data_store['role_id'] = $input['role'];
            $data_store['image_id'] = $input['image'];
            $data_store['created_at'] = now();
            $data_store['updated_at'] = now();

            DB::pdo()->beginTransaction();

            try {

                $user_id = DB::table('users')->insert_get_id($data_store);

                DB::pdo()->commit();

                return Redirect::to_route('admin-user-edit', [$user_id])->with('success', 'user created successfully!');

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

        $user = User::with(['role', 'media'])->where_in('id', [$id])->first();

        if (!$user) {

            return Redirect::back()->with('error', 'User not found!');

        }

        $data['user'] = $user;
        $data['roles'] = Role::all();

        return View::make('admin::user.edit', $data);

    }

    public function action_update($id)
    {

        if (Request::method() == 'PUT') {

            $user = User::with(['role'])->where_in('id', [$id])->first();

            if (!$user) {

                return Redirect::back()->with('error', 'User not found!');

            }

            $user_id = $user->id;

            $input = Input::all();

            $rules = [
                'name'  => 'required',
                'username' => 'required',
                'email' => 'required',
                'role' => 'required',
            ];

            $validation = Validator::make($input, $rules);

            if ($validation->fails()) {

                return Redirect::back()->with_errors($validation)->with_input();

            }

            DB::pdo()->beginTransaction();

            try {

                $data_update = [];

                $data_update['name'] = $input['name'];
                $data_update['username'] = $input['username'] ? Str::slug($input['username']) : Str::slug($input['name']);
                $data_update['email'] = $input['email'];
                $data_update['biodata'] = $input['biodata'] ?: null;
                $data_update['role_id'] = $input['role'];
                $data_update['image_id'] = $input['image'];
                $data_update['updated_at'] = now();

                if($input['password'] !== null && $input['password'] !== ''){

                    $data_update['password'] = Hash::make($input['password']);

                }

                User::where_in('id', [$user_id])->update($data_update);

                DB::pdo()->commit();

                return Redirect::to_route('admin-user-edit', [$user_id])->with('success', 'user updated successfully!');

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

            $user = User::with(['role'])->where_in('id', [$id])->first();

            if (!$user) {

                return Redirect::back()->with('error', 'User not found!');

            }

            $user_id = $user->id;

            DB::pdo()->beginTransaction();

            try {

                User::where_in('id', [$user_id])->delete();

                $medias = Media::where_in('user_id', [$user_id])->get();

                if ($medias) {

                    foreach ($medias as $media) {

                        if (file_exists('assets/packages/admin/media/' . $media->filename)) {

                            unlink('assets/packages/admin/media/' . $media->filename);

                        }

                        Media::where_in('id', [$media->id])->delete();

                    }

                }

                DB::pdo()->commit();

                return Redirect::to_route('admin-user')->with('success', 'user deleted successfully!');

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
