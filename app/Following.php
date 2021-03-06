<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
