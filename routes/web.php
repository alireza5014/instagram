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


//$middlewares = \Config::get('lfm.middlewares');
//array_push($middlewares, '\Unisharp\Laravelfilemanager\middleware\MultiUser');
// make sure authenticated
//Route::group(array('prefix' => 'laravel-filemanager/user'), function ()
//{
//
//});


Route::group(['prefix' => '/laravel-filemanager','middleware' => 'auth:user'], function () {




    // Show LFM
    Route::get('/', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    // upload
    Route::any('/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload')->name('unisharp.lfm.upload');
    // list images & files
    Route::get('/jsonitems', '\UniSharp\LaravelFilemanager\Controllers\ItemsController@getItems');
    // folders
    Route::get('/newfolder', '\UniSharp\LaravelFilemanager\Controllers\FolderController@getAddfolder');
    Route::get('/deletefolder', '\UniSharp\LaravelFilemanager\Controllers\FolderController@getDeletefolder');
    Route::get('/folders', '\UniSharp\LaravelFilemanager\Controllers\FolderController@getFolders');
    // crop
    Route::get('/crop', '\UniSharp\LaravelFilemanager\Controllers\CropController@getCrop');
    Route::get('/cropimage', '\UniSharp\LaravelFilemanager\Controllers\CropController@getCropimage');
    // rename
    Route::get('/rename', '\UniSharp\LaravelFilemanager\Controllers\RenameController@getRename');
    // scale/resize
    Route::get('/resize', '\UniSharp\LaravelFilemanager\Controllers\ResizeController@getResize');
    Route::get('/doresize', '\UniSharp\LaravelFilemanager\Controllers\ResizeController@performResize');
    // download
    Route::get('/download', '\UniSharp\LaravelFilemanager\Controllers\DownloadController@getDownload');
    // delete
    Route::get('/delete', '\UniSharp\LaravelFilemanager\Controllers\DeleteController@getDelete');
    // edit
    Route::get('/edit', '\UniSharp\LaravelFilemanager\Controllers\EditController@getEdit');
    // update
    Route::post('/update/{id}', '\UniSharp\LaravelFilemanager\Controllers\EditController@update');
});



Route::group(['prefix' => '/user'], function () {


//    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
//
//
//
//    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
//





    Route::group(['middleware' => 'auth:user'], function () {



        Route::get('/home', 'User\UserController@home')->name('user.home');


        Route::get('/account/list', 'User\AccountController@list')->name('user.account.list');
        Route::post('/account/create', 'User\AccountController@create')->name('user.account.create');



        Route::get('/post/list', 'User\PostController@list')->name('user.post.list');
        Route::get('/post/{type}/new', 'User\PostController@new')->name('user.post.new');



         Route::get('/post/edit/{id}', 'User\PostController@edit')->name('user.post.edit');
        Route::post('/post/{type}/create', 'User\PostController@create')->name('user.post.create');
        Route::post('/post/video/create_video', 'User\PostController@create_video')->name('user.post.create_video');


        Route::post('/post/edit/modify', 'User\PostController@modify')->name('user.post.modify');




        Route::get('/slider/list', 'User\SliderController@list')->name('user.slider.list');
        Route::post('/slider/create', 'User\SliderController@create')->name('user.slider.create');

    });

});
