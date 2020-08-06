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
Route::resource('posts', 'PostController');

// tags
Route::get('/tags', 'TagController@index')->name('tags');
Route::get('/tags/{tag}', 'TagController@posts')->name('tags.posts');

// comments
Route::resource('comments', 'CommentController');

// user
Route::get('/{user:username}', 'UserController@profile')->name('user');
Route::get('/{user:username}/edit', 'UserController@edit')->name('user.edit');

// @UserUpdate
// Account
Route::put('/{user:username}', 'UserController@updateAccount')->name('user.update_account');
// Profile
Route::put('/profile/{user:username}', 'UserController@updateProfile')->name('user.update_profile');
// Security
Route::put('/security/{user:username}', 'UserController@updateSecurity')->name('user.update_security');
