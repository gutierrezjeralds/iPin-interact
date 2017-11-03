<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthSessionController extends Controller
{
    public function postSecure(){
        if (Auth::check())
            return 1;
        else
            return 0;
    }
}
