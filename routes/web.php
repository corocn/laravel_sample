<?php

use Illuminate\Http\Request;
use App\Task;

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

/**
 * タスクダッシュボード表示
 */
Route::get('/', "TaskController@show");

Route::get('/task', function () {
    return redirect('/');
});

/**
 * 新タスク追加
 */
Route::post('/task', "TaskController@create");

/**
 * タスク削除
 */
Route::delete('/task/{task}', "TaskController@delete");

