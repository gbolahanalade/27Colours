<?php

class Tag extends Eloquent {
	protected $fillable = [];
	protected $table = 'tags';

	public function songs()
	{
		return $this->belongsToMany('Song');
	}

	public function videos()
	{
			return $this->belongsToMany('Video');
	}

	public function galleries()
	{
		return $this->belongsToMany('Gallery');
	}


}