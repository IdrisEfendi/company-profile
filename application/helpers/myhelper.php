<?php

defined('DS') or exit('No direct access.');

if (!function_exists('home_url')) {
    function home_url()
    {
        return env('APP_HOME');
    }
}

if (!function_exists('default_user')) {
    function default_user($value = '')
    {
        return asset('img/default-user.png');
    }
}

if (!function_exists('echo_r')) {
    function echo_r($value = '')
    {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }
}

if (!function_exists('echo_rr')) {
    function echo_rr($value = '')
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }
}

if (!function_exists('env')) {
    function env($name)
    {
        return $_ENV[$name];
    }
}

if (!function_exists('replace_url_get_params')) {
    function replace_url_get_params($url, $paramName, $paramValue, $paramRemove = false)
    {
        // Parse the URL into its components
        $urlComponents = parse_url($url);

        // Parse the query string into an associative array
        parse_str($urlComponents['query'] ?? '', $queryParams);

        // Daftar parameter yang ingin dihapus
        $paramsToRemove = ['subdomain', 'subfolder1', 'subfolder2', 'subfolder3', 'subfolder4'];
        if ($paramRemove) {

            if (is_array($paramRemove)) {
                foreach ($paramRemove as $param) {
                    $paramsToRemove[] = $param;
                }
            } else {
                $paramsToRemove[] = $paramRemove;
            }
        }
        // Menghapus parameter tertentu dari array query
        foreach ($paramsToRemove as $param) {
            if (isset($queryParams[$param])) {
                unset($queryParams[$param]);
            }
        }

        // Update the query parameter without encoding
        $queryParams[$paramName] = $paramValue;

        // Build the new query string
        $newQueryString = http_build_query($queryParams, '', '&', PHP_QUERY_RFC3986);

        // Replace the encoded value with the original value to preserve commas
        $newQueryString = str_replace(rawurlencode($paramValue), $paramValue, $newQueryString);

        // Reconstruct the URL with the new query string
        $newUrl = $urlComponents['scheme'] . '://' . $urlComponents['host'];

        if (isset($urlComponents['port'])) {
            $newUrl .= ':' . $urlComponents['port'];
        }

        $newUrl .= $urlComponents['path'] . '?' . $newQueryString;

        if (isset($urlComponents['fragment'])) {
            $newUrl .= '#' . $urlComponents['fragment'];
        }

        return $newUrl;
    }
}

if (!function_exists('url_media')) {
    function url_media($id = null)
    {
        return Media::where('id', $id)->only('guid');
    }
}

if (!function_exists('icon')) {
    function icon()
    {
        $icon = DB::table('settings')->where('slug', 'app-icon')->first();

        if ($icon && $icon->value) {

            $icon_url = url_media($icon->value);

            return $icon_url;

        } else {

            return asset('packages/admin/img/icon.png');

        }
    }
}

if (!function_exists('hitung_jumlah_hari_cuti')) {
    function hitung_jumlah_hari_cuti($tanggal_mulai, $tanggal_selesai, $include_start = true)
    {
        $mulai = new DateTime($tanggal_mulai);
        $selesai = new DateTime($tanggal_selesai);

        // Selisih tanggal
        $interval = $mulai->diff($selesai);

        $jumlahHari = $interval->days;

        // Jika ingin menghitung tanggal mulai juga, tambah 1
        if ($include_start) {
            $jumlahHari += 1;
        }

        return $jumlahHari;
    }

}

if (!function_exists('status_cuti')) {
    function status_cuti($key)
    {
        $data = [
            'diajukan' => '<span class="inline-flex items-center rounded-md bg-orange-50 px-2 py-1 text-xs font-medium text-orange-600 ring-1 ring-inset ring-orange-500/10 dark:bg-orange-400/10 dark:text-orange-400 dark:ring-orange-400/20">Diajukan</span>',
            'disetujui' => '<span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-500/10 dark:bg-green-400/10 dark:text-green-400 dark:ring-green-400/20">DIsetujui</span>',
            'ditolak' => '<span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-600 ring-1 ring-inset ring-red-500/10 dark:bg-red-400/10 dark:text-red-400 dark:ring-red-400/20">Ditolak</span>',
            'selesai' => '<span class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-600 ring-1 ring-inset ring-indigo-500/10 dark:bg-indigo-400/10 dark:text-indigo-400 dark:ring-indigo-400/20">Selesai</span>'
        ];
        return $data[$key] ?? null;
    }
}


if (!function_exists('format_tanggal_indo_waktu')) {
    function format_tanggal_indo_waktu($datetime)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $hari = [
            1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        ];

        $timestamp = strtotime($datetime);
        $hari_ke = date('N', $timestamp);
        $tgl = date('j', $timestamp);
        $bln = date('n', $timestamp);
        $thn = date('Y', $timestamp);
        $jam = date('H:i', $timestamp);

        return $hari[$hari_ke] . ', ' . $tgl . ' ' . $bulan[$bln] . ' ' . $thn . ' pukul ' . $jam . ' WIB';
    }
}

if (!function_exists('format_tanggal')) {
    function format_tanggal($tanggal)
    {
        $hari = [
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            7 => 'Minggu'
        ];

        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $timestamp = strtotime($tanggal);
        $hari_ke = date('N', $timestamp); // 1–7
        $tgl = date('j', $timestamp);
        $bln = date('n', $timestamp);
        $thn = date('Y', $timestamp);

        return $tgl . ' ' . $bulan[$bln] . ' ' . $thn;
    }

}

if (!function_exists('format_tanggal_indo')) {
    function format_tanggal_indo($tanggal)
    {
        $hari = [
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            7 => 'Minggu'
        ];

        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $timestamp = strtotime($tanggal);
        $hari_ke = date('N', $timestamp); // 1–7
        $tgl = date('j', $timestamp);
        $bln = date('n', $timestamp);
        $thn = date('Y', $timestamp);

        return $hari[$hari_ke] . ', ' . $tgl . ' ' . $bulan[$bln] . ' ' . $thn;
    }

}


if (!function_exists('haversine')) {

    function haversine($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371000; // meter
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $earthRadius * $c;
    }

}

if (!function_exists('month_name')) {

    function month_name($m)
    {
        return [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ][$m - 1];
    }

}

if (!function_exists('start_day_of_month')) {

    function start_day_of_month($y, $m)
    {
        return date('w', strtotime("$y-$m-01"));
    }

}

if (!function_exists('days_in_month')) {

    function days_in_month($y, $m)
    {
        return date('t', strtotime("$y-$m-01"));
    }

}

if (!function_exists('kpi_keterangan')) {

    function kpi_keterangan($nilai)
    {

        $data = [
            'diajukan' => '<span class="inline-flex items-center rounded-md bg-orange-50 px-2 py-1 text-xs font-medium text-orange-600 ring-1 ring-inset ring-orange-500/10 dark:bg-orange-400/10 dark:text-orange-400 dark:ring-orange-400/20">Diajukan</span>',
            'disetujui' => '<span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-500/10 dark:bg-green-400/10 dark:text-green-400 dark:ring-green-400/20">DIsetujui</span>',
            'ditolak' => '<span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-600 ring-1 ring-inset ring-red-500/10 dark:bg-red-400/10 dark:text-red-400 dark:ring-red-400/20">Ditolak</span>',
            'selesai' => '<span class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-600 ring-1 ring-inset ring-indigo-500/10 dark:bg-indigo-400/10 dark:text-indigo-400 dark:ring-indigo-400/20">Selesai</span>'
        ];


        if ($nilai >= 90) {
            return '<span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-500/10 dark:bg-green-400/10 dark:text-green-400 dark:ring-green-400/20">Sangat Baik</span>';
        } elseif ($nilai >= 80) {
            return '<span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-600 ring-1 ring-inset ring-blue-500/10 dark:bg-blue-400/10 dark:text-blue-400 dark:ring-blue-400/20">Baik</span>';
        } elseif ($nilai >= 70) {
            return '<span class="inline-flex items-center rounded-md bg-orange-50 px-2 py-1 text-xs font-medium text-orange-600 ring-1 ring-inset ring-orange-500/10 dark:bg-orange-400/10 dark:text-orange-400 dark:ring-orange-400/20">Cukup</span>';
        } else {
            return '<span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-600 ring-1 ring-inset ring-red-500/10 dark:bg-red-400/10 dark:text-red-400 dark:ring-red-400/20">Perlu Pembinaan</span>';
        }
    }

}





