<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');



Route::group(['middleware' => 'auth'], function () {
    Route::post('/upload', 'XLSFilesController@upload');
    Route::get('/demo', 'XLSFilesController@demo');
    Route::get('/results/{id}', 'XLSFilesController@results');
    Route::get('/download', 'XLSFilesController@downloadTemplate');
    Route::get('/download/{id}', 'XLSFilesController@download');
    Route::get('/history','XLSFilesController@index');
    Route::get('upload', function() {
        return View::make('pages.upload');
    });
});


Route::get('fire', function () {
    // this fires the event
    event(new App\Events\EventName());
    return "event fired";
});

Route::get('fire2', function () {
    // this fires the event
    $data = [
        'message' => 'lalalaal',
        'link' => 'test',
        'indetificator'=>'dasdasdasd'
    ];
    event(new App\Events\ExcelImportWasDone($data));
    return "event fired";
});




Route::get('test', function () {
    // this checks for the event
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
