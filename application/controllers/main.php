<?php

defined('DS') or exit('No direct access.');

class Main_Controller extends Controller
{
    protected $themeCookie = 'theme';

    public function __construct()
    {
        $this->middleware('before', 'csrf');
    }

    public function action_index()
    {
        $data = [];
        
        return View::make('index', $data);
    }

    public function action_profile()
    {
        return View::make('profile', []);
    }

    public function action_services()
    {
        return View::make('services', []);
    }

    public function action_contact()
    {
        return View::make('contact', []);
    }

    public function action_theme($mode = 'light')
    {
        $theme = strtolower((string) $mode) === 'dark' ? 'dark' : 'light';

        Cookie::forever($this->themeCookie, $theme);

        return Redirect::back();
    }
}
