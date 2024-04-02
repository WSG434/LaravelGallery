<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    private $posts;
    public function __construct(PostService $postService)
    {
        $this->posts=$postService;
    }
    function index() {
        $posts = $this->posts->all();
        return view('mainPage', ['imagesInView' => $posts]);
    }

    function newPost(){
        return view('newPost');
    }

    function showPost($id){
        $post = $this->posts->one($id);
        return view('showPost', ['imageInView' => $post->image]);
    }

    function editPost($id){
        $post = $this->posts->one($id);
        return view ('editPost', ['imageInView' => $post]);
    }

    function deletePost($id) {
        $this->posts->delete($id);
        return redirect('/');
    }

    function storePost(Request $request){
        $this->posts->add($request->file('image'));
        return redirect('/');
    }

    function updatePost(Request $request, $id){
        $this->posts->update($id, $request->image);
        return redirect('/');
    }

}
