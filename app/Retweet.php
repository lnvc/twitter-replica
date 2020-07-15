<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retweet extends Model
{
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
