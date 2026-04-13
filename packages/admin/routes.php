<?php

defined('DS') or exit('No direct access.');

use System\Routing\Route;

/*
|--------------------------------------------------------------------------
| Route
|--------------------------------------------------------------------------
|
| Cukup beri tahu rakit kata kerja HTTP dan URI yang harus ditanggapi.
| Rakit juga mendukung RESTful routing yang sangat cocok untuk membangun
| aplikasi berskala besar maupun API sederhana.
|
*/

Route::get('(:package)/test', function () {

    $data_store = [
        'name' => 'Admin',
        'username' => 'admin',
        'email' => 'idrisefendi171@gmail.com',
        'password' => Hash::make('admin123'),
        'role_id' => 1,
        'image_id' => 0,
        'created_at' => now(),
        'updated_at' => now(),
    ];

    DB::table('users')->insert_get_id($data_store);

    echo_r('OK');
});

Route::get('(:package)/media/open', ['as' => 'admin-media-open', 'uses' => 'admin::media@open']);
Route::get('(:package)/media', ['as' => 'admin-media', 'uses' => 'admin::media@index']);
Route::get('(:package)/media/create', ['as' => 'admin-media-create', 'uses' => 'admin::media@create']);
Route::post('(:package)/media', ['as' => 'admin-media-store', 'uses' => 'admin::media@store']);
Route::post('(:package)/media/more', ['as' => 'admin-media-more', 'uses' => 'admin::media@more']);
Route::post('(:package)/media/detail', ['as' => 'admin-media-detail', 'uses' => 'admin::media@detail']);
Route::delete('(:package)/media', ['as' => 'admin-media-destroy', 'uses' => 'admin::media@destroy']);
Route::put('(:package)/media', ['as' => 'admin-media-update', 'uses' => 'admin::media@update']);

Route::group(['before' => 'auth|permissions'], function () {

    Route::get('(:package)', ['as' => 'admin-dashboard', 'uses' => 'admin::dashboard@index']);

    Route::get('(:package)/role', ['as' => 'admin-role', 'uses' => 'admin::role@index']);
    Route::get('(:package)/role/create', ['as' => 'admin-role-create', 'uses' => 'admin::role@create']);
    Route::post('(:package)/role', ['as' => 'admin-role-store', 'uses' => 'admin::role@store']);
    Route::get('(:package)/role/edit/(:any)', ['as' => 'admin-role-edit', 'uses' => 'admin::role@edit']);
    Route::put('(:package)/role/(:any)', ['as' => 'admin-role-update', 'uses' => 'admin::role@update']);
    Route::delete('(:package)/role/(:any)', ['as' => 'admin-role-destroy', 'uses' => 'admin::role@destroy']);

    Route::get('(:package)/label', ['as' => 'admin-label', 'uses' => 'admin::label@index']);
    Route::get('(:package)/label/create', ['as' => 'admin-label-create', 'uses' => 'admin::label@create']);
    Route::post('(:package)/label', ['as' => 'admin-label-store', 'uses' => 'admin::label@store']);
    Route::get('(:package)/label/edit/(:any)', ['as' => 'admin-label-edit', 'uses' => 'admin::label@edit']);
    Route::put('(:package)/label/(:any)', ['as' => 'admin-label-update', 'uses' => 'admin::label@update']);
    Route::delete('(:package)/label/(:any)', ['as' => 'admin-label-destroy', 'uses' => 'admin::label@destroy']);

    Route::get('(:package)/menu', ['as' => 'admin-menu', 'uses' => 'admin::menu@index']);
    Route::get('(:package)/menu/create', ['as' => 'admin-menu-create', 'uses' => 'admin::menu@create']);
    Route::post('(:package)/menu', ['as' => 'admin-menu-store', 'uses' => 'admin::menu@store']);
    Route::get('(:package)/menu/edit/(:any)', ['as' => 'admin-menu-edit', 'uses' => 'admin::menu@edit']);
    Route::put('(:package)/menu/(:any)', ['as' => 'admin-menu-update', 'uses' => 'admin::menu@update']);
    Route::delete('(:package)/menu/(:any)', ['as' => 'admin-menu-destroy', 'uses' => 'admin::menu@destroy']);

    Route::get('(:package)/permission', ['as' => 'admin-permission', 'uses' => 'admin::permission@index']);
    Route::post('(:package)/permission', ['as' => 'admin-permission-store', 'uses' => 'admin::permission@store']);

    Route::get('(:package)/user', ['as' => 'admin-user', 'uses' => 'admin::user@index']);
    Route::get('(:package)/user/create', ['as' => 'admin-user-create', 'uses' => 'admin::user@create']);
    Route::post('(:package)/user', ['as' => 'admin-user-store', 'uses' => 'admin::user@store']);
    Route::get('(:package)/user/edit/(:any)', ['as' => 'admin-user-edit', 'uses' => 'admin::user@edit']);
    Route::put('(:package)/user/(:any)', ['as' => 'admin-user-update', 'uses' => 'admin::user@update']);
    Route::delete('(:package)/user/(:any)', ['as' => 'admin-user-destroy', 'uses' => 'admin::user@destroy']);
    
    Route::get('(:package)/signout', ['as' => 'admin-signout', 'uses' => 'admin::auth@signout']);
});

Route::group(['before' => 'guest'], function () {

    Route::get('(:package)/signin', ['as' => 'admin-signin', 'uses' => 'admin::auth@index']);
    route::post('(:package)/authenticate', ['as' => 'admin-authenticate', 'uses' => 'admin::auth@authenticate']);
    Route::get('(:package)/signup', ['as' => 'admin-signup', 'uses' => 'admin::auth@signup']);
});
