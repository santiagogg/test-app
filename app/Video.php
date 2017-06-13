<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    public function location()
    {
        return $this->hasOne('App\Location');
    }

    public function keys()
    {
        return $this->hasMany('App\Location');
    }
    public function likes()
    {
        return $this->belongsToMany('App\User','likes');
    }
}
