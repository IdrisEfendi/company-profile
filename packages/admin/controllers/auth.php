<?php

defined('DS') or exit('No direct access.');

class Admin_Auth_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('before', 'csrf|throttle:60,1');
    }

    public function action_index()
    {
        
        return View::make('admin::auth.index');
    }

    public function action_authenticate()
    {

        if (Request::method() == 'POST') {

            $input = Input::all();

            $rules = [
                'email' => ['required'],
                'password' => ['required'],
            ];

            $validation = Validator::make($input, $rules);

            if ($validation->fails()) {

                return Redirect::back()->with_errors($validation)->with_input();
            }

            $credentials = [
                'email' => $input['email'],
                'password' => $input['password'],
            ];

            if (Auth::attempt($credentials)) {

                return Redirect::to_route('admin-dashboard');
            }

            echo_rr(Auth::attempt($credentials));
            echo_r($credentials);

            die;

            return Redirect::back()->with('error', 'Your email or password is incorrect')->with_input();
        }
    }

    public function action_signout()
    {

        Auth::logout();
        return Redirect::to_route('admin-signin');
    }
}
