<?php

use Illuminate\Http\Request;

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


Route::group(['namespace'=>'Site', 'middleware' => ['origin']], function () {

    Route::any('/blog', "PostController@getBlog");
    Route::any('/tariffe', "TariffeController@getTariffe");
    Route::any('/about_us', "PostController@about_us");
    Route::any('/contact_us', "PostController@contact_us");


    Route::get('/postContent', "PostController@getPostContent");
});


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
