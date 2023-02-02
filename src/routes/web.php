<?php
//
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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


Route::get('/folders/{id}/tasks','App\Http\Controllers\TaskController@index')->name('tasks.index');

Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
Route::get('/folders/create', 'FolderController@create');

