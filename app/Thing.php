<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Color;

class Thing extends Model
{
    public $timestamps = false;

    public function color()
    {
        return $this->belongsTo('App\Color');
    }
}
