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

Route::group(['before' => 'admin-auth|permissions|status_cuti'], function () {});

Route::group(['before' => 'guest'], function () {

    Route::get('(:package)/signin', ['as' => 'admin-signin', 'uses' => 'admin::auth@index']);
    route::post('(:package)/authenticate', ['as' => 'admin-authenticate', 'uses' => 'admin::auth@authenticate']);
    Route::get('(:package)/signup', ['as' => 'admin-signup', 'uses' => 'admin::auth@signup']);
});
