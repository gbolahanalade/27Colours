<?php

class Blog extends Eloquent {

	protected $fillable = [];
	protected $table = 'blogs';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function tags()
	{
		return $this->morphToMany('Tag','taggable');
	}
	public function comments()
	{
		return $this->morphMany('Comment','commentable');
	}
}