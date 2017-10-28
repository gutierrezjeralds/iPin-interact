<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use JavaScript;
use App\Post;

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
    public function index(Request $request){
        if (Auth::guest()) {
            return view('auth.register');
        }
        
        $user = Auth::user();
        $posts = Post::OrderBy('created_at', 'desc') -> paginate(3);

        if ($request->ajax()) {
            $view = view('contents.dashboard.includes.view',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }

        Javascript::put(['user_id' => $user->id, 'user_fullname' => $user->fullname, 'username' => $user->username, 'postPageCount' => $posts->lastPage()]);
        
        return view('contents.dashboard.home', compact('posts'));
    }
}
