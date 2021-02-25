<?php

use App\Http\Controllers\TasksController;
use App\Models\Jobs;
use App\Models\People;
use App\Models\Task;
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

Route::get('/', 'App\Http\Controllers\PeopleController@index');

Route::post('/create', 'App\Http\Controllers\PeopleController@store');

Route::get('/', 'App\Http\Controllers\PeopleController@create');

Route::patch('/editp/{id}', 'App\Http\Controllers\PeopleController@update');

Route::get('/editp/{id}', 'App\Http\Controllers\PeopleController@edit');

Route::delete('/{id}', 'App\Http\Controllers\PeopleController@deletePeople');

//---------------------------------------------------------------------------

Route::get('/', 'App\Http\Controllers\TasksController@index');

Route::post('/', 'App\Http\Controllers\TasksController@store');

Route::get('/', 'App\Http\Controllers\TasksController@create');

Route::patch('/editt/{id}', 'App\Http\Controllers\TasksController@update');

Route::get('/editt/{id}', 'App\Http\Controllers\TasksController@edit');

Route::delete('/del/{id}', 'App\Http\Controllers\TasksController@deleteTask');

