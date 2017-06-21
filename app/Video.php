<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //

    protected $with = ['likes'];
    protected $appends = ['likesCount', 'isLiked'];

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Keyword','tags');
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

    /**
     * Like the current video.
     *
     * @return Model
     */
    public function like()
    {

        if (!$this->likes()->where('user_id', auth()->id())->exists()) {
            return $this->likes()->attach(auth()->id());
        }
    }

    /**
     * Unlike the current video.
     */
    public function unlike()
    {
        $this->likes()->detach(auth()->id());
    }

    /**
     * Determine if the current video has been liked.
     *
     * @return boolean
     */
    public function isLiked()
    {
        return !!$this->likes()->where('user_id', auth()->id())->count();
    }

    /**
     * Fetch the liked status as a property.
     *
     * @return bool
     */
    public function getIsLikedAttribute()
    {
        return $this->isLiked();
    }

    /**
     * Get the number of likes for the video.
     *
     * @return integer
     */
    public function getLikesCountAttribute()
    {
        return $this->likes->count();
    }

}
