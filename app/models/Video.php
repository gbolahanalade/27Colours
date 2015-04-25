<?php
use Nicolaslopezj\Searchable\SearchableTrait;
class Video extends Eloquent {
use SearchableTrait;

	protected $fillable = [];
	protected $table = 'videos';


	protected $searchable = [
        'columns' => [
            'title' =>5,
            'description'=>5,
            ],
          
     ];

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

    public function getYoutube($url)
	{
    	if (strpos( $url,"v=") !== false)
    	{
        return substr($url, strpos($url, "v=") + 2, 11);
    	}
    	elseif(strpos( $url,"embed/") !== false)
    	{
        return substr($url, strpos($url, "embed/") + 6, 11);
    	}

  }
}