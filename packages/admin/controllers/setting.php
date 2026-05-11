<?php

defined('DS') or exit('No direct access.');

class Admin_Setting_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('before', 'csrf|throttle:60,1');
    }

    public function action_index()
    {
        $settings = [];

        foreach (DB::table('settings')->get() as $setting) {
            $settings[$setting->slug] = $setting->value;
        }

        return View::make('admin::setting.index', [
            'settings' => $settings,
            'mediaFields' => ['app-logo', 'app-icon', 'site-hero-image', 'seo-og-image'],
        ]);
    }

    public function action_update()
    {
        if (Request::method() != 'POST') {
            return View::make('error.404');
        }

        $input = Input::all();
        unset($input['_token']);

        DB::pdo()->beginTransaction();

        try {
            foreach ($this->allowed() as $slug => $meta) {
                $value = isset($input[$slug]) ? trim((string) $input[$slug]) : '';
                $this->save($slug, $meta['name'], $value, $meta['type']);
            }

            DB::pdo()->commit();

            return Redirect::to_route('admin-setting')->with('success', 'Settings updated successfully!');
        } catch (\Exception $e) {
            DB::pdo()->rollBack();
            Log::error($e->getMessage());

            return Redirect::back()->with('error', 'Something went wrong!')->with_input();
        }
    }

    protected function save($slug, $name, $value, $type = 0)
    {
        $exists = DB::table('settings')->where('slug', $slug)->count();

        $payload = [
            'name' => $name,
            'slug' => $slug,
            'value' => $value,
            'type' => $type,
            'updated_at' => now(),
        ];

        if ($exists) {
            DB::table('settings')->where('slug', $slug)->update($payload);
            return;
        }

        $payload['created_at'] = now();
        DB::table('settings')->insert_get_id($payload);
    }

    protected function allowed()
    {
        return [
            'app-name' => ['name' => 'Nama Website', 'type' => 0],
            'app-deskripsi' => ['name' => 'Deskripsi Website', 'type' => 1],
            'app-logo' => ['name' => 'Logo Website', 'type' => 2],
            'app-icon' => ['name' => 'Favicon/Icon', 'type' => 2],
            'site-footer-text' => ['name' => 'Footer Text', 'type' => 1],
            'seo-title' => ['name' => 'SEO Title', 'type' => 0],
            'seo-description' => ['name' => 'SEO Description', 'type' => 1],
            'seo-keywords' => ['name' => 'SEO Keywords', 'type' => 1],
            'seo-og-image' => ['name' => 'SEO OG Image', 'type' => 2],
            'site-hero-image' => ['name' => 'Hero Image', 'type' => 2],
            'site-hero-title' => ['name' => 'Hero Title', 'type' => 1],
            'site-hero-subtitle' => ['name' => 'Hero Subtitle', 'type' => 1],
            'site-about-title' => ['name' => 'Tentang Title', 'type' => 1],
            'site-about-body' => ['name' => 'Tentang Body', 'type' => 1],
            'site-vision' => ['name' => 'Visi', 'type' => 1],
            'site-mission-1' => ['name' => 'Misi 1', 'type' => 1],
            'site-mission-2' => ['name' => 'Misi 2', 'type' => 1],
            'site-mission-3' => ['name' => 'Misi 3', 'type' => 1],
            'site-mission-4' => ['name' => 'Misi 4', 'type' => 1],
            'site-contact-address' => ['name' => 'Alamat', 'type' => 1],
            'site-contact-phone' => ['name' => 'Nomor Telepon', 'type' => 0],
            'site-contact-email' => ['name' => 'Email', 'type' => 0],
            'site-contact-hours' => ['name' => 'Jam Layanan', 'type' => 0],
            'site-social-facebook' => ['name' => 'Facebook', 'type' => 0],
            'site-social-instagram' => ['name' => 'Instagram', 'type' => 0],
            'site-social-linkedin' => ['name' => 'LinkedIn', 'type' => 0],
        ];
    }
}
