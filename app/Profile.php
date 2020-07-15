<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'handle',
        'bio', 
        'location',
        'website',
        'birthday',
        'profile_pic',
        'cover',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tweets() 
    {
        return $this->hasMany('App\Tweet');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function retweets()
    {
        return $this->hasMany('App\Retweet');
    }

    public function followers()
    {
        return $this->hasMany('App\Follower');
    }

    public function followings()
    {
        return $this->hasMany('App\Following');
    }
    
}
