<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Tag(){
        return $this->BelongsToMany(Tag::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    

}
