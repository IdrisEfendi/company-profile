<?php

defined('DS') or exit('No direct access.');

class Admin_Dashboard_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('before', 'csrf|throttle:60,1');
    }

    public function action_index()
    {
        $data = [];

        return View::make('admin::dashboard.index', $data);
    }
}
