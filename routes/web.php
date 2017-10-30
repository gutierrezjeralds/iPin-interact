<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/',[
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

Route::get('/{username}', [
    'uses' => 'ProfileController@profile',
    'as' => 'profile'
]);

Route::get('mediaphoto/{userid}/{filename}', [
    'uses' => 'GetUploadMediaController@getMediaPhoto',
    'as' => 'media.photo'
]);

Route::get('/inner-view-display/{post_id}', [
    'uses' => 'PostController@getVIewPost',
    'as' => 'post.inner.view.display'
]);

Route::group(['middleware'=>'auth'], function(){
    Route::post('/post-media-photo',[
        'uses' => 'PostController@postMediaPhoto',
        'as' => 'post.mdeia.photo'
    ]);

    Route::post('/post-upload-media-photo',[
        'uses' => 'PostController@postUploadMediaPhoto',
        'as' => 'post.upload.mdeia.photo'
    ]);

    Route::post('/edit-post',[
        'uses' => 'PostController@postEditPost',
        'as' => 'post.edit'
    ]);

    Route::get('/delete-post/{user_id}/{post_id}', [
        'uses' => 'PostController@getDeletePost',
        'as' => 'post.delete'
    ]);
});
