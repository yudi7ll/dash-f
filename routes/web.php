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

Auth::routes();

Route::get('/', 'PostController@index')->name('home');

// posts
Route::get('/{user:id}/post', 'PostController@userPost')->name('user.post');
Route::resource('post', 'PostController');

// tags
Route::get('tags', 'TagController@index')->name('tags');
Route::get('tags/{tag}', 'TagController@post')->name('tags.post');

// comments
Route::resource('comment', 'CommentController');

// users
Route::get('/{user:username}', 'UserController@profile')->name('profile');
