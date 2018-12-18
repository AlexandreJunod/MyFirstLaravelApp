<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Thing;

class Color extends Model
{
    public $timestamps = false;

    public function things()
    {
        return $this->hasMany('App\Thing');
    }
}
