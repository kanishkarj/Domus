<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channels;

class ChannelsController extends Controller
{
    public function index(){
        return view('channels.create');
    }
    public function edit($slug){
        $channel = Channels::where('slug',$slug)->get()->first();
        return view('channels.create',compact('channel'));
    }
    
    public function store(Request $request){
        $channel = new Channels;

        $path = $request -> file('avatar')->store('public/channels');
        $path = str_replace('public','storage',$path);
        $path = '/' . $path;

        $channel -> title = $request -> title;
        $channel -> user_id = auth()->id();
        $channel -> slug = str_slug($request -> title);
        $channel -> caption = $request -> caption;
        $channel -> avatar = $path;

        $channel->save();
       
    }

    public function patch(Request $request,$slug){
        $channel = Channels::where('slug',$slug)->get()->first();
        
        if($request -> file())  {
            $channel->avatar = str_replace('storage','public',$channel->avatar);
            \Storage::delete($channel->avatar);
            $path = $request -> file('avatar')->store('public/channels');
            $path = str_replace('public','storage',$path);
            $path = '/' . $path;
            $channel -> avatar = $path;
        }      
        

        $channel -> title = $request -> title;
        $channel -> slug = str_slug($request -> title);
        $channel -> caption = $request -> caption;
        
       

        $channel->save();
        
        
    }
}

