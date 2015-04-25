<?php

class Vcomment extends Eloquent {

	protected $fillable = [];
	protected $table = 'vcomments';

	public function user()
	{
		return $this->belongsTo('User');
	}

	
	public function song()
	{
		return $this->belongsTo('Video');
	}

	 public function scopeApproved($query)
  {
    return $query->where('is_approved', true);
  }

  public function scopeSpam($query)
  {
    return $query->where('spam', true);
  }

  public function scopeNotSpam($query)
  {
    return $query->where('spam', false);
  }

 
 public function getCreateRules()
    {
        return array(
            'comment'=>'required|min:10',
            'rating'=>'required|integer|between:1,5'
        );
    }

}