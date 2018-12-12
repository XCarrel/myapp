<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Color;

class Thing extends Model
{
    public $timestamps = false;

    public function colors()
    {
        return $this->belongsToMany('App\Color');
    }
}
