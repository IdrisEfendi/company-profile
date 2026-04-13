<?php

use Utopia\Domains\Domain;

defined('DS') or exit('No direct access.');

class Helper
{

    public static function pagination($query, $per_page = 10)
    {

        // Ambil nomor halaman dari parameter atau set default 1
        $page = Input::get('page') ? (int) Input::get('page') : 1;
        // Hitung total baris dari tabel
        $total_rows = (clone $query)->count();
        // Hitung offset berdasarkan halaman saat ini
        $offset = ($page - 1) * (int) $per_page;
        // Ambil data pengguna dengan pagination
        $results = (clone $query)->skip($offset)->take($per_page)->get();

        $data = [];
        $data['results'] = $results;
        $data['per_page'] = $per_page;
        $data['page'] = $page;
        $data['total_rows'] = $total_rows;

        return $data;
    }

    public static function sidebar()
    {

        return Label::with(['menus'])->get() ?? null;
    }

    public static function setting($slug = null)
    {

        return DB::table('settings')->where('slug', $slug)->only('value') ?? null;
    }
}
