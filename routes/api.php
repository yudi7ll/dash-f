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
    Route::get('post', 'PostController@index');
    Route::get('populars', 'PostController@populars');
    Route::get('tagscard', 'TagController@index');

    // images
    Route::get('cover/{cover}', 'ImageController@getCoverImage')->name('cover');
    Route::get('cover/{cover}/thumb', 'ImageController@getCoverThumb')->name('cover.thumb');
    Route::get('image/{width}/{height}', 'ImageController@index')->name('image');
});

