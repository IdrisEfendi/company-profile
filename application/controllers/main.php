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

    public function action_theme($mode = 'light')
    {
        $theme = strtolower((string) $mode) === 'dark' ? 'dark' : 'light';

        Cookie::forever($this->themeCookie, $theme);

        return Redirect::back();
    }
}
