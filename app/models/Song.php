<?php
use Nicolaslopezj\Searchable\SearchableTrait;

class Song extends Eloquent {
	use SearchableTrait;

	protected $fillable = [];
	protected $table = 'songs';

	public static $rules = array(
		'title' =>'required|min:2',
		'description'=>'min:10',	
		'artist_name'=>'min:2',
		'youtube_link'=>'min:8',
		'soundcloud_link'=>'min:8',
		//'image'=>'image|mimes:jpeg,jpg,bmp,png,gif'
		//'song_url' => 'mimes:mp3,aac,wav'
	);


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


	public function recalculateRating()
  {
    $reviews = $this->reviews()->notSpam()->approved();
    $avgRating = $reviews->avg('rating');
    $this->rating_cache = round($avgRating,1);
    $this->rating_count = $reviews->count();
    $this->save();
  }

  public function getTimeagoAttribute()
    {
    	$date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    	return $date;
    }

    public function comments()
	{
		return $this->morphMany('Comment','commentable');
	}

	public function getCurrenttimeAttribute()
	{

   	$date =\Carbon\Carbon::now()->toDateTimeString();
	return $date;
	}

    public function scopeIdDescending($query)
    {
        return $query->orderBy('id','DESC');
    }

    public function scopeRelatedSong($query)
    {
    	return $query->where('user_d');
    } 

    public function getSoundcloud($url)
	{
    	
    	if (strpos( $url,"tracks/") !== false)
    	{
        return substr($url, strpos($url, "tracks/") + 7, 9);
    	}
    	//elseif(strpos( $url,"com/") !== false)
    	//{
       // return substr($url, strpos($url, "com/") + 6, strlen($url));
    	//}

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
