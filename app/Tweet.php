<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
