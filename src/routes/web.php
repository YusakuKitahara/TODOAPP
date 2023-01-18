<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/trash', [PostController::class, 'trash'])->name('post.trash');
Route::post('/create', [PostController::class, 'create']);
Route::post('/check/change', [PostController::class, 'checkedChange']);
Route::post('/softdelete', [PostController::class, 'goToTrash']);
Route::post('/restore', [PostController::class, 'restore']);
Route::post('/delete', [PostController::class, 'delete']);
