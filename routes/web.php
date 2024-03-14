<?php

use App\Http\Controllers\ImagesController;
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

Route::get('/', [ImagesController::class, 'index']);
Route::get('/create', [ImagesController::class,'addPost']);
Route::get('/show/{id}', [ImagesController::class,'showPost']);
Route::get('/edit/{id}', [ImagesController::class,'editPost']);
Route::get('/delete/{id}', [ImagesController::class,'deletePost']);

Route::post('/store', [ImagesController::class, 'storePost']);
Route::post('/update/{id}', [ImagesController::class, 'updatePost']);


