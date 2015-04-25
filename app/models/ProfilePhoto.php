<?php

class ProfilePhoto extends Eloquent {
	protected $table = 'profile_photos';

	protected $fillable = [];

	public static $rules = array(
	'image'=>'image|mimes:jpeg,jpg,bmp,png,gif'
	);

    public function user()
    {
        return $this->belongsTo('User');
    }
}