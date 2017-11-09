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
use App\VideoLink;
use App\VideoFile;

class PostController extends Controller
{
    public function postMediaPhoto(Request $request){
        //Validation
        $this->validate($request, [
           //'photoFile' => 'required',
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

        if (is_null($request -> input("photoFile"))) {
            Session::flash('upload_mdeia_error', 'Error occured while uploading your photo. Please retry!');
        } else{
            Session::flash('upload_mdeia', 'Successfully pin your moments!');
        }

        return redirect()->back();

        //return $request -> all();
    }

    public function postUploadMediaPhoto(Request $request){
        $user = Auth::user();

        $photo = $request -> file('photo');
        // $filename = '1609141608152015' . time() . uniqid() . '.' . $video_file -> getClientOriginalExtension();
        $filename = $photo -> getClientOriginalName();

        Storage::disk('public')->put($user->id . '/media/photo/' . $filename, File::get($photo));
    }

    public function postMediaVideoFile(Request $request){
        //Validation
        $this->validate($request, [
           //'video_link' => 'required',
        ]);

        $user = Auth::user();

        $post = new Post;
        $post -> caption = $request -> caption;
        $post -> user_id = $user -> id;

        if ( $video_file_request = $request -> file('video_file') ) {

            $filename = '1609141608152015' . time() . uniqid() . '.' .  $video_file_request -> getClientOriginalExtension();
            //$filename = $video_file_request -> getClientOriginalName();

            Storage::disk('public')->put($user->id . '/media/video/' . $filename, File::get($video_file_request));

            $video_file =  new VideoFile;
            $video_file -> video_file = $filename;
            $video_file -> user_id = $user -> id;
            $video_file -> post_id = 0;
            $video_file -> save();

            $post -> video_file_id = $video_file -> id;
        }

        $post -> save();
        VideoFile::where('user_id', $user->id) -> where('post_id', 0) -> update(['post_id' => $post->id]);

        $storageVideoFileDeleted = storage_path() . '\\app\public\\' . $user->id . '\\media\delete\video\\';
        File::makeDirectory($storageVideoFileDeleted, 0775, true, true);

        if (is_null($request -> file('video_file'))) {
            Session::flash('upload_mdeia_error', 'Error occured while uploading your video file. Please retry!');
        } else{
            Session::flash('upload_mdeia', 'Successfully pin your moments!');
        }

        return redirect()->back();
        // return $request -> all();
    }

    public function postMediaVideoLink(Request $request){
        //Validation
        $this->validate($request, [
           //'video_link' => 'required',
        ]);

        $user = Auth::user();

        $post = new Post;
        $post -> caption = $request -> caption;
        $post -> user_id = $user -> id;

        if ($request -> input("video_link")) {
            $video_link =  new VideoLink;
            $video_link -> video_link = $request -> video_link;
            $video_link -> user_id = $user -> id;
            $video_link -> post_id = 0;
            $video_link -> save();

            $post -> video_link_id = $video_link -> id;
        }

        $post -> save();
        VideoLink::where('user_id', $user->id) -> where('post_id', 0) -> update(['post_id' => $post->id]);

        if (is_null($request -> input("video_link"))) {
            Session::flash('upload_mdeia_error', 'Error occured while uploading your video link. Please retry!');
        } else{
            Session::flash('upload_mdeia', 'Successfully pin your moments!');
        }

        return redirect()->back();
        // return $request -> all();
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

        $media_video_file = VideoFile::where('post_id', $post_id);
        $video_files = VideoFile::where('post_id', $post_id) -> get();

        $media_video_link = VideoLink::where('post_id', $post_id);

        $post -> delete();
        $media_photo -> delete();
        $media_video_file -> delete();
        $media_video_link -> delete();

        foreach ($photos as $photo) {
            $old_photo_path = storage_path() . '\\app\public\\' . $user_id . '\\media\photo\\' . $photo -> photo;
            $new_photo_path = storage_path() . '\\app\public\\' . $user_id . '\\media\delete\photo\\' . $photo -> photo;

            $move = File::move($old_photo_path, $new_photo_path);
        }

        foreach ($video_files as $video_file) {
            $old_video_file_path = storage_path() . '\\app\public\\' . $user_id . '\\media\video\\' . $video_file -> video_file;
            $new_video_fileo_path = storage_path() . '\\app\public\\' . $user_id . '\\media\delete\video\\' . $video_file -> video_file;

            $move = File::move($old_video_file_path, $new_video_fileo_path);
        }
    }

    public function getVIewPost($post_id){
        $post_views = Post::where('id', $post_id)->first();
        return view('contents.dashboard.includes.view.modal.view', compact('post_views'))->render();
    }
}
