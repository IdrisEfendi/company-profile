<?php

defined('DS') or exit('No direct access.');

class Auth_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('before', 'csrf');
    }

    public function action_index()
    {
        // echo 'Efendi';
        var_dump($_ENV);
    }
}
