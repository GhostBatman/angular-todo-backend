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
    return view('welcome');});
Route::get('/getItems', 'JsonApiController@index');
Route::get('/getItems', 'JsonApiController@index');
Route::get('/main/index.html', function () {
    return view('main.index');});
Route::post('/editAndCreateTask', 'JsonApiController@editAndCreateTask');
Route::post('/removeTask', 'JsonApiController@removeTask');