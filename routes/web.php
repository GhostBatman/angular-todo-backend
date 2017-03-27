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
Route::get('/main/index.html', function () {
    return view('main.index');
});

Route::group(['prefix' => 'api/v1'], function () {
    Route::get('/task-lists', 'TaskListController@index');
    Route::get('/task-lists/{id}/tasks', 'TaskController@index');
    Route::delete('/tasks/{id}', 'TaskController@removeTask');
    Route::post('/task-lists/{id}/tasks', 'TaskController@createTask');
    Route::put('/tasks/{id}', 'TaskController@updateTask');
    Route::put('/taskLists/{id}', 'TaskListController@updateTaskLists');
    Route::post('/task-lists', 'TaskListController@createTaskList');
});