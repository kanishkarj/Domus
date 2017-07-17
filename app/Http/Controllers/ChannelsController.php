<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channels;

class ChannelsController extends Controller
{
    public function index(){
        return view('channels.create');
    }
    public function store(Request $request){
        $channel = new Channels;

        $path = $request -> file('avatar')->store('public/channels');
        
        $channel -> title = $request -> title;
        $channel -> user_id = auth()->id();
        $channel -> slug = str_slug($request -> title);
        $channel -> caption = $request -> caption;
        $channel -> avatar = $path;

        $channel->save();
       
    }
}

