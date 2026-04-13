<?php

defined('DS') or exit('No direct access.');

class Main_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('before', 'csrf');
    }

    public function action_index()
    {
        $data = [];
        
        return View::make('index', $data);
    }
}
