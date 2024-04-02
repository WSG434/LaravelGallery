<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostsController::class, 'index']);
Route::get('/create', [PostsController::class,'newPost']);
Route::get('/show/{id}', [PostsController::class,'showPost']);
Route::get('/edit/{id}', [PostsController::class,'editPost']);
Route::get('/delete/{id}', [PostsController::class,'deletePost']);

Route::post('/store', [PostsController::class, 'storePost']);
Route::post('/update/{id}', [PostsController::class, 'updatePost']);


