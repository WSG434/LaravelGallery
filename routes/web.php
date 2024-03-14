<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    $images = DB::table('images')
        ->select('*')
        ->get();
    $imagesFromDB = $images->all();


    return view('mainPage', ['imagesInView' => $imagesFromDB]);
});

Route::get('/create', function (){
   return view('createPost');
});

Route::get('/show/{id}', function ($id){
    $image = DB::table('images')
        ->select('*')
        ->where('id', $id)->first();
    $imageFromDB = $image->image;
    return view('showPost', ['imageInView' => $imageFromDB]);
});

Route::get('/edit/{id}', function ($id){
    $image = DB::table('images')
        ->select('*')
        ->where('id', $id)->first();
    $imageFromDB = $image;
    return view ('editPost', ['imageInView' => $imageFromDB]);
});

Route::post('/store', function (Request $request){
   $image = $request->file('image');
   $filename = $image->store('images');

    DB::table('images')->insert([
        'image' => $filename
    ]);
    return redirect('/');
});

Route::post('/update/{id}', function (Request $request, $id){
    $image = DB::table('images')
        ->select('*')
        ->where('id', $id)->first();
    Storage::delete($image->image);

    $filename = $request->image->store('images');
    DB::table('images')
        ->where('id', $id)
        ->update(['image' => $filename]);
    return redirect('/');
});


Route::get('/delete/{id}', function($id) {
    $image = DB::table('images')
        ->select('*')
        ->where('id', $id)->first();
    Storage::delete($image->image);

    DB::table('images')->where('id', '=', $id)->delete();
    return redirect('/');
});
