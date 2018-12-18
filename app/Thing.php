<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    public $timestamps = false;

    public function color()
    {
        return $this->belongsToMany('App\Color');
    }
}
