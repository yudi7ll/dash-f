<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// users
Route::get('/{user}')->name('profile');
Route::get('/profile/me', 'UserController@authProfile')->name('profile.me');

// posts
Route::get('/{user:id}/post', 'PostController@userPost')->name('user.post');
Route::resource('post', 'PostController');

// tags
Route::get('tags/{tags}', 'PostController@tags')->name('tags');

// comments
Route::resource('comment', 'CommentController');

// Route::get('/', 'PostController@index')->name('home');
// Route::get('/post', 'PostController@create');
//
// Route::middleware('auth:web')->group(function () {
//     Route::post('/post', 'PostController@store')
// });

// Route::get('/home', 'HomeController@index')->name('home');
