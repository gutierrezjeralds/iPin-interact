<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Javascript::put(['user_id' => $user->id, 'user_fullname' => $user->first_name . ' ' . $user->last_name, 'username' => $user->username]);
        
        return view('home');
    }
}
