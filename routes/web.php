<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('mainPage');
});

Route::get('/create', function (){
   return view('createPost');
});

Route::get('/show', function (){
   return view('showPost');
});

Route::get('/edit', function (){
    return view ('editPost');
});

Route::post('/store', function (Request $request){
   $image = $request->file('image');
   dd(public_path());
   dd($image->store());
//    dd($image);
});
