<?php

namespace App;
use App\Image;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Tag(){
        return $this->BelongsToMany(Tags::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function images(){
        return $this->HasMany(Image::class);
    }

}
