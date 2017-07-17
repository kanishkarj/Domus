<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;
class Channels extends Model
{
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function users(){
        return $this->BelongsToMany(User::class);
    }
}
