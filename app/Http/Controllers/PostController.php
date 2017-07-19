<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tags;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TagsController;

//include('Parsedown.php');

class PostController extends Controller
{

    public function index(){
        return view('posts.create');
    }

    public function edit($slug){
        $post = Post::where('slug',$slug)->get()->first();
        return view('posts.create',compact('post'));
    }

    public function show($postslug){
        $Parsedown = new \Parsedown();
        $post = Post::where('slug',$postslug)->get()->first();
        $post ->content = $Parsedown->text($post ->content);
        return view('posts.show',compact('post'));
    }

    public function store(Request $request){
        $post = new Post;
        
        $post -> user_id = auth()->id();//
        $post -> title = request('title'); 
        $post -> slug = str_slug(request('title')) . time();  
        $post -> content = request('content');
        $post -> subtitle = request('subtitle');
        $post->save();

    //save Tags
        $tagList = explode(",", request('tags'));
        foreach($tagList as $value){
            $value = trim($value);
            $tag = new Tags;
            $tag->name = $value;
            $tag->slug = str_slug($value);
            if(!\App\Tags::where('slug',$tag->slug)->get()->first())
            {
                $tag->save();
            }
            $tag = $post->Tag()->save($tag);
        }
    //save Images

        foreach($request->file() as $key=>$value){
            $captionKey = "caption".substr($key, -1);
            $caption = request($captionKey);
            $path = $value->store('public/posts/'. str_slug($post->title));
            $path = str_replace('public','storage',$path);
            $path = '/' . $path;
            $image = new Image;
            $image->path = $path;
            if($caption){
                $image->caption = $caption;
            }
            else{
                $image->caption = '';
            }    

            $image -> post_id = $post -> id;
            $image->save();
        }
    }

    public function patch(Request $request,$slug){
        $post =  Post::where('slug',$slug)->get()->first();
        
        $post -> title = request('title'); 
        $post -> slug = str_slug(request('title')) . time();  
        $post -> content = request('content');
        $post -> subtitle = request('subtitle');
        $post->save();
        
        $tagRelations = $post->tags(); 
         foreach($post->tags as $tag){
            $tag->delete();
         }
         if($tagRelations)
            $tagRelations->detach();
    //save Tags
        $tagList = explode(",", request('tags'));
        
        foreach($tagList as $value){

            $value = trim($value);
            if(strlen($value)){
                $tag = new Tags;
            $tag->name = $value;
            $tag->slug = str_slug($value);
            return($tag->toArray());
            if(!\App\Tags::where('slug',$tag->slug)->get()->first())
            {
                $tag->save();
            }
            $tag = $post->Tag()->save($tag);

            }
            
        }

        foreach($post->images as $image){
            $image->path = str_replace('storage','public',$image->path);
            \Storage::delete($image->path);
            $image->delete();
        }

    //save Images
        foreach($request->file() as $key=>$value){
            $captionKey = "caption".substr($key, -1);
            $caption = request($captionKey);

            $path = $value->store('public/posts/'. str_slug($post->title));
            $path = str_replace('public','storage',$path);
            $path = '/' . $path;
            $image = new Image;
            $image->path = $path;
            if($caption){
                $image->caption = $caption;
            }
            else{
                $image->caption = '';
            }    

            $image -> post_id = $post -> id;
            $image->save();
        }
    }
}
