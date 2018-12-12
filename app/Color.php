<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $timestamps = false;

    public function things()
    {
        return $this->hasMany('Thing');
    }
}
