<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    public function video()
    {
        return $this->hasOne('App\Video');
    }
}
