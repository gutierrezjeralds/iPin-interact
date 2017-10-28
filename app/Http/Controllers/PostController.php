<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Post;
use App\Photo;

class PostController extends Controller
{
    public function postMediaPhoto(Request $request){
        //Validation
        $this->validate($request, [
           'photoFile' => 'required',
        ]);

        $user = Auth::user();

        $post = new Post;
        $post -> caption = $request -> caption;
        $post -> user_id = $user -> id;

     	if ($request -> input("photoFile")){
            foreach ($request -> photoFile as $photo){
                // $filename = '1609141608152015' . time() . uniqid() . '.png';

                $filename = $photo;

                $photo =  new Photo;
                $photo -> photo = $filename;
                $photo -> user_id = $user -> id;
                $photo -> post_id = 0;
                $photo -> save();

                $post -> photo_id = $photo -> id;
            }
        }

        $post -> save();
        Photo::where('user_id', $user->id) -> where('post_id', 0) -> update(['post_id' => $post->id]);
        Session::flash('upload_mdeia', 'Successfully pin your moments!');
        return redirect()->back();

        //return $request -> all();
    }

    public function postUploadMediaPhoto(Request $request){
        $user = Auth::user();

        $photo = $request -> file('photo');
        // $filename = '1609141608152015' . time() . uniqid() . '.png';
        $filename = $photo -> getClientOriginalName();

        Storage::disk('public')->put($user->id . '/media/photo/' . $filename, File::get($photo));
    }
}
