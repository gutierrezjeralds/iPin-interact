<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JavaScript;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if (Auth::guest()) {
            return view('auth.register');
        }
        
        $user = Auth::user();
        Javascript::put(['user_id' => $user->id, 'user_fullname' => $user->fullname, 'username' => $user->username]);
        
        return view('contents.dashboard.home');
    }
}
