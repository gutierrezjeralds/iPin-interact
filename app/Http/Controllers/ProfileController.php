<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use JavaScript;
use App\User;
use App\Post;

class ProfileController extends Controller
{
    public function profile(Request $request, $username){

        $users = User::where('username', $username) -> get();

		foreach ($users as $profile) {
        	$posts = Post::OrderBy('created_at', 'desc') -> where('user_id', $profile->id) -> paginate(8);

	        if ($request->ajax()) {
	            $view = view('contents.dashboard.includes.view',compact('posts'))->render();
	            return response()->json(['html'=>$view]);
	        }

	        Javascript::put(['user_id' => $profile->id, 'user_fullname' => $profile->fullname, 'username' => $profile->username, 'postPageCount' => $posts->lastPage()]);

	        return view('contents.dashboard.profile', compact('posts'));
		}
		return view('errors.404');
    }
}
