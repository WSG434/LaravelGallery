<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    function index() {
        $images = DB::table('images')
            ->select('*')
            ->get();
        $imagesFromDB = $images->all();
        return view('mainPage', ['imagesInView' => $imagesFromDB]);
    }

    function addPost(){
        return view('createPost');
    }

    function showPost($id){
        $image = DB::table('images')
            ->select('*')
            ->where('id', $id)->first();
        $imageFromDB = $image->image;
        return view('showPost', ['imageInView' => $imageFromDB]);
    }

    function editPost($id){
        $image = DB::table('images')
            ->select('*')
            ->where('id', $id)->first();
        $imageFromDB = $image;
        return view ('editPost', ['imageInView' => $imageFromDB]);
    }

    function deletePost($id) {
        $image = DB::table('images')
            ->select('*')
            ->where('id', $id)->first();
        Storage::delete($image->image);

        DB::table('images')->where('id', '=', $id)->delete();
        return redirect('/');
    }

    function storePost(Request $request){
        $image = $request->file('image');
        $filename = $image->store('images');

        DB::table('images')->insert([
            'image' => $filename
        ]);
        return redirect('/');
    }

    function updatePost(Request $request, $id){
        $image = DB::table('images')
            ->select('*')
            ->where('id', $id)->first();
        Storage::delete($image->image);

        $filename = $request->image->store('images');
        DB::table('images')
            ->where('id', $id)
            ->update(['image' => $filename]);
        return redirect('/');
    }

}
