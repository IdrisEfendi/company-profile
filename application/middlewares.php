<?php

defined('DS') or exit('No direct access.');

/*
|--------------------------------------------------------------------------
| Middleware
|--------------------------------------------------------------------------
|
| Middleware menyediakan cara untuk melampirkan fungsionalitas ke rute anda.
| Middleware bawaan 'before' dan 'after' akan dipanggil sebelum dan sesudah
| setiap request direspon.
|
*/

Route::middleware('permissions', function () {

    if (Auth::user()->role->slug != 'administrator') {

        $permissions = DB::table('permissions')
            ->select(['menus.*'])
            ->left_join('menus', 'permissions.menu_id', '=', 'menus.id')
            ->where('permissions.role_id', Auth::user()->role_id)
            ->get();

        $permissions = $permissions ? array_column($permissions, 'slug') : [];
        $permissions = array_merge($permissions, ['dashboard', 'signin', 'signout', 'signup', 'authenticate']);

        if (!in_array(URI::segment(2, 'dashboard'), $permissions)) {

            return View::make('error.404');
        }
    }
});

Route::middleware('csrf', function () {
    if (Request::forged()) {
        return Response::error(422);
    }
});

Route::middleware('auth', function () {
    if (Auth::guest()) {
        return Response::error(401);
    }
});

Route::middleware('throttle', function ($limit, $minutes) {
    // if (Throttle::exceeded($limit, $minutes)) {
    //     return Throttle::error();
    // }
});
