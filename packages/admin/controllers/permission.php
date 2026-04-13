<?php

defined('DS') or exit('No direct access.');



class Admin_Permission_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('before', 'csrf|throttle:60,1');
    }

    public function action_index()
    {

        $data = [];

        $data['roles'] = Role::with(['permissions'])->get();
        $data['menus'] = Menu::order_by('label_id', 'asc')->get();

        return View::make('admin::permission.index', $data);

    }

    public function action_store()
    {

        if (Request::method() == 'POST') {

            DB::pdo()->beginTransaction();

            try {

                $role_id = Input::get('role_id');
                $permissions = Input::get('permissions');

                foreach ($role_id as $k_role_id => $v_role_id) {

                    if (!empty($permissions[$v_role_id])) {

                        $permission = $permissions[$v_role_id];

                        $check_permission = DB::table('permissions')
                            ->where('role_id', $v_role_id)
                            ->get();

                        if ($check_permission && $permission) {

                            foreach ($check_permission as $k_pe => $v_pe) {

                                if (!in_array($v_pe->menu_id, $permission)) {

                                    DB::table('permissions')->where('id', $v_pe->id)->delete();
                                
                                }

                            }

                        }

                        foreach ($permission as $k_menu_id => $v_menu_id) {

                            $check_permission = DB::table('permissions')
                                ->where('role_id', $v_role_id)
                                ->where('menu_id', $v_menu_id)
                                ->count();

                            if (!$check_permission) {

                                DB::table('permissions')->insert_get_id([
                                    'role_id' => $v_role_id,
                                    'menu_id' => $v_menu_id,
                                ]);

                            }

                        }

                    } else {

                        DB::table('permissions')->where('role_id', $v_role_id)->delete();

                    }

                }

                DB::pdo()->commit();

                return Redirect::to_route('admin-permission')->with('success', 'Permission set successfully!');

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
