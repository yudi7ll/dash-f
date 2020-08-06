<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function () {
    Route::get('/posts', 'PostController@index');
    Route::get('/posts/{user:username}', 'PostController@userPosts');

    // images
    Route::get('/cover/{cover}', 'ImageController@getCoverImage')->name('cover');
    Route::get('/cover/{cover}/thumb', 'ImageController@getCoverThumb')->name('cover.thumb');
    Route::get('/image/{width}/{height}', 'ImageController@index')->name('image');

    // likes
    Route::patch('likes/{post:slug}', 'LikeControllers@deleteOrStore')->name('like.posts');
});

