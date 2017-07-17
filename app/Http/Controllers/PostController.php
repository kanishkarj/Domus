<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tags;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TagsController;

class PostController extends Controller
{
    public function index(){
        return view('posts.create');
    }
    public function store(Request $request){
        $post = new Post;

        $post -> user_id = auth()->id();//
        $post -> title = request('title'); 
        $post -> slug = str_slug(request('title'));  
        $post -> content = request('content');
        $post -> subtitle = request('subtitle');
        $post->save();

    //save Tags
        $tagList = explode(",", request('tags'));
        foreach($tagList as $value){
            $value = trim($value);
            $tag = new Tags;
            $tag->name = $value;
            $tag->save();
            $tag = $post->Tag()->save($tag);
        }
    //save Images

        foreach($request->file() as $value){
            $path = $value->store('public/posts/'. str_slug($post->title).'/');
            $image = new Image;
            $image->path = $path;
            $image -> post_id = $post -> id;
            $image->save();
        }
    }
}
