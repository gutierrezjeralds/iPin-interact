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

        $storagePhotoDeleted = storage_path() . '\\app\public\\' . $user->id . '\\media\delete\photo\\';
        File::makeDirectory($storagePhotoDeleted, 0775, true, true);

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

    public function postEditPost(Request $request){
        $post = Post::find($request['postId']);

        if (Auth::user() != $post->user){
            return redirect()->back();
        }

        $post->caption = $request['caption'];
        $post->update();
        return response()->json(['new_caption' => $post->caption], 200);
    }

    public function getDeletePost($user_id, $post_id){
        $post = Post::findOrFail($post_id);

        if (Auth::user() != $post->user){
            return redirect()->back();
        }

        $media_photo = Photo::where('post_id', $post_id);
        $photos = Photo::where('post_id', $post_id) -> get();

        $post -> delete();
        $media_photo -> delete();

        foreach ($photos as $photo) {
            $old_photo_path = storage_path() . '\\app\public\\' . $user_id . '\\media\photo\\' . $photo -> photo;
            $new_photo_path = storage_path() . '\\app\public\\' . $user_id . '\\media\delete\photo\\' . $photo -> photo;

            $move = File::move($old_photo_path, $new_photo_path);
        }
    }

    public function getVIewPost($post_id){
        $posts = Post::where('id', $post_id)->get();
        return view('contents.extras.modals.view', compact('posts'))->render();
    }
}
