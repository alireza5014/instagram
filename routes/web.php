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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['prefix' => '/user'], function () {


    Route::group(['middleware' => 'auth:user'], function () {


        Route::get('/home', 'User\UserController@home')->name('user.home');


        Route::get('/post/list', 'User\PostController@list')->name('user.post.list');
        Route::get('/post/new', 'User\PostController@new')->name('user.post.new');
        Route::post('/post/create', 'User\PostController@create')->name('user.post.create');


    });
});
