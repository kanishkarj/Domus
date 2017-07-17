<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('posts.create');
    }
    public function store(Request $request){
        $post = new Post;

        $post -> user_id = auth()->id();
        $post -> title = request('title'); 
        $post -> content = request('content');
        $post -> subtitle = request('subtitle');
    }
}
