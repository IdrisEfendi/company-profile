<?php

defined('DS') or exit('No direct access.');

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

Route::get('/', 'main@index');
Route::get('sitemap.xml', 'main@sitemap');
Route::get('profil', 'main@profile');
Route::get('layanan', 'main@services');
Route::get('kontak', 'main@contact');
Route::get('artikel', 'main@articles');
Route::get('artikel/(:any)', 'main@article');
Route::get('theme/(:any)', 'main@theme');
