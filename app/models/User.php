<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class User extends Eloquent implements ConfideUserInterface
{
    use ConfideUser;
    protected $table = 'users';
   // protected $primaryKey = 'email';
    protected $fillable = [];

public function blogs()
	{
	return $this->hasMany('Blog');
	}
public function coomments()
	{
	return $this->hasMany('Comment');
	}
public function profiles()
	{
	return $this->hasMany('Profile');
	}

	public function profilePhoto()
	{
		return $this->hasOne('ProfilePhoto');
	}
	
	public function songs()
	{
	return $this->hasMany('Song');
	}
	public function videos()
	{
	return $this->hasMany('Video');
	}
	public function galleries()
	{
		return $this->hasMany('Gallery');
	}

	public function pictures()
	{
		return $this->hasMany('Picture');
	}
	
	public function getFullNameAttribute()
	{
		return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
	}

	public function getTimeagoAttribute()
    {
    	$date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    	return $date;
    }

    public function scopeConfirmed($query)
	{
 		return $query->where('confirmed', 1);
	}



}