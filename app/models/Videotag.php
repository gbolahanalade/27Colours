<?php

class Videotag extends Eloquent {

protected $table = 'videotags';

    public function video()
    {
        return $this->belongsTo('Video');
    }
}