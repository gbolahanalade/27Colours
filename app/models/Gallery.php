<?php
use Nicolaslopezj\Searchable\SearchableTrait;
class Gallery extends Eloquent {
use SearchableTrait;

	protected $fillable = [];
	protected $table = 'galleries';


protected $searchable = [
            'columns' => [
            'caption' => 10,
            ],
      ];
      
public static $rules = array(
		'caption'=>'min:6',	
		'image'=>'image|mimes:jpeg,jpg,bmp,png,gif'		
	);
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function tags()
	{
		return $this->belongsToMany('Tag');
	}
	public function comments()
	{
		return $this->morphMany('Comment','commentable');
	}

	public function getTimeagoAttribute()
    {
    	$date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    	return $date;
    }

    public function scopeIdDescending($query)
    {
        return $query->orderBy('id','DESC');
    }
}