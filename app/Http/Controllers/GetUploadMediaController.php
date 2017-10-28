<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Post;

class GetUploadMediaController extends Controller
{
    public function getMediaPhoto($user_id, $filename){
        $file = Storage::disk('public')->get($user_id . '/media/photo/' . $filename);
        return new Response($file, 200);
    }
}
