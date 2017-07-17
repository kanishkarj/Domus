<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Channels;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user-name','bio','avatar','gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    function userFollowers()
    {
        return $this->belongsToMany('App\User', 'followers', 'user_id', 'follower_id');
    }

    function followUser(User $user) {
        $this->followers()->attach($user->id);
    }

    function unfollowUser(User $user) {
        $this->followers()->detach($user->id);
    }

    public function channels(){
        return $this->BelongsToMany(Channels::class);
    }
}
