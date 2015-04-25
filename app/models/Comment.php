<?php

class Comment extends Eloquent{
	
	public function commentable()
	{
		return $this->morphTo();
	}

	public function user()

	{
		return $this->belongsTo('User');
	}


}