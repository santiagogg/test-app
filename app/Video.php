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

    public function keywords()
    {
        return $this->hasMany('App\Keywords');
    }
    
    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes');
    }

    /**
     * Todo: Decide How we are going to handle the File Info.
     */
    public function updateFileInfo()
    {
        $this->duration = 0;
        $this->file_size = 0;
        $this->video_format = 0;
        $this->bit_rate = 0;
    }
}
