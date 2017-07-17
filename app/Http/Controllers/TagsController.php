<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tags;
class TagsController extends Controller
{
    public function store($tags,$post){
        
        $tagList = split(",", $tags);
        foreach($tagList as $value){
            $value = $value.trim();
            $tag = new Tags;
            $tag->name = $value;
            $tag->save();
            $tag = $post->Tag()->save($tag);
        }
       
    }
}
