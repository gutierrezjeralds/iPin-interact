<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JavaScript;
use App\User;

class ProfileController extends Controller
{
    public function profile(Request $request, $username){
        $user = Auth::user();
        $users = User::where('username', $username) -> get();

        Javascript::put(['user_id' => $user->id, 'user_fullname' => $user->fullname, 'username' => $user->username]);

        return view('contents.dashboard.profile');
    }
}
