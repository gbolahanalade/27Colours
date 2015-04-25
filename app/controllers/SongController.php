<?php
class SongController extends BaseController
{
 
    /* get functions */
    
    public function index()
    {

        $songs =    Song::orderBy('id','desc')->take(8)->get();
        $afrobeats= Song::where('genre', '=', 'Afrobeat')->take(3)->orderBy('id','desc')->get();
        $highlifes= Song::where('genre', '=', 'highlife')->take(3)->orderBy('id','desc')->get();
        $rnbs=      Song::where('genre', '=', 'RnB')->take(3)->orderBy('id','desc')->get();
        $hips=      Song::where('genre', '=', 'Hip-Hop')->take(3)->orderBy('id','desc')->get();
        $gospels=   Song::where('genre', '=', 'Gospel')->take(3)->orderBy('id','desc')->get();
        $others=    Song::where('genre', '=', 'Others')->take(3)->orderBy('id','desc')->get();
        
        return View::make('song.index',['songs'=>$songs,'afrobeats'=>$afrobeats,'highlifes'=>$highlifes, 'rnbs'=>$rnbs,
         'hips'=>$hips, 'gospels'=>$gospels,'others'=>$others]);

    }


    public function showSong(Song $song)
    {
        $id= $song->id;
        $genre= $song->genre;
        $reSongs =  Song::where('genre', '=', $genre)->take(5)->orderBy('id','desc')->get();

         return View::make('song.single')
        ->with('song',$song)
        ->with('genre', $genre)
        ->with('reSongs',$reSongs);
       
    }
     public function showSongP(Song $song)
    {
         $reviews = $song->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(20);
         $tags =$song->tags;
       
        return View::make('profile.single2')
        ->with('song',$song)
        ->with('reviews',$reviews)
        ->with('tag', $tags);
    }

    public function getNew()
    {
    if (Auth::check()) {

     $user = Auth::user();      
     $s_count= $user->songs()->count();
     if ($s_count < 10 ) {
        return View::make('song.song-upload');
       
            }
            else {
                return View::make('notice');
            }
        }

         else {
            return Redirect::to('/profile/#error')->with('error', 'Please Login/ Signup to upload');
        }

     }



     public function postArtCreate()
     {
        $song = [
            'soundcloud' => Input::get('soundcloud'),
            'song' => Input::file('song'),
        ];

        $rules = [
            'soundcloud' => 'min:5'|'required_without:song',
            'song'=> 'mimes:mp3,aac,wav'|'required_without:soundcloud',
        ];

       $validator = Validator::make($song, $rules);
        if ($validator->passes())
        {
        
            $song =new Song;
            $soundcloud = Input::get('soundcloud');
            $mus= $song->getSoundcloud($soundcloud);
            $song->soundcloud= $mus;

            if (Input::hasFile('song'))
             {

                $music = Input::file('song');
                $extension = $music->getClientOriginalExtension();
                $filename = str_random(12);
                $name = $filename.'.'.$extension;
                $desPath= public_path('img/songs/');
                $upload_success = $music->move($desPath, $name);
                $song->song ='img/songs/'.$name;

                 if (! isset($song->song))
                    { 
                 return Redirect::to('/song/upload')
                ->with('errors', 'Problem with your upload');
                    }
                }

                $song->user()->associate(Auth::user());
                $song->save();   

                return View::make('song.last-upload')
                 ->with('song', $song)
                 ->with('notices', 'New song added!!! Complete the remaining details below');
            }
            
         return Redirect::to('/song/upload')
        ->with('errors', $validator->messages())
        ->withInput(Input::except('song'));
        

    }

    public function postCreate()
    {
        $music = [
            'youtube' => Input::get('youtube'),
            'title' => Input::get('title'),
            'description' => Input::get('description'),
            'image' => Input::file('image'),
            'song' =>Input::file('song'),
            'soundcloud' => Input::get('soundcloud'),
            
            
        ];

        $rules = [
            'youtube' => 'min:5',
            'title' => 'required',
            'description' => 'min:5',
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:3000',
            'song' => 'max:20000',
            'soundcloud' => 'min:5',
         ];

        $validator = Validator::make($music, $rules);
        if ($validator->passes())
        {

            $song =new Song;
            $soundcloud = Input::get('soundcloud');
            $mus= $song->getSoundcloud($soundcloud);
            $song->soundcloud= $mus;

            if (Input::hasFile('song'))
             {
            $music = Input::file('song');
            $song_fileName= $music->getClientOriginalName();
            $name = Str::random(6).'_'.$song_fileName;
            $desPath= public_path('img/songs/');
            $upload_success = $music->move($desPath, $name);
            $song->song ='img/songs/'.$name;
           }

            $youtube = Input::get('youtube');
            $vid= $song->getYoutube($youtube);
            $song->youtube= $vid;
            $song->title = Input::get('title');
            $song->description= Input::get('description');
            $song->genre =Input::get('genre');

            $imag= Input::file('image');
            $image_name = $imag->getClientOriginalName();
            $name = Str::random(6).'_'.$image_name;
            $desPath= public_path('img/songs/images/');
            $upload_success =$imag->move($desPath, $name);
            $song->image='img/songs/images/'.$name;

            $song->user()->associate(Auth::user());
            $song->save(); 

            return Redirect::to('/profile')
            ->with('notices', 'New song added!!!');
       
  
        }

        return Redirect::to('/song/upload')
        ->with('errors', $validator->messages())
        ->withInput(Input::only('title','description','youtube','soundcloud','genre'));
     }

     

     public function edit(Song $song)
     {
        return View::make('profile.songs.edit2')
        ->with('song', $song);
     }

     public function doEdit()
     {

        $music = [
            'youtube' => Input::get('youtube'),
            'title' => Input::get('title'),
            'description' => Input::get('description'),
            'image' => Input::file('image'),
            
        ];

        $rules = [
            'youtube' => 'min:5',
            'title' => 'required|min:4',
            'description' => 'min:5',
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',

        ];

        $validator = Validator::make($music, $rules);
        if ($validator->passes())
        {

            $song= Song::findorFail(Input::get('id'));
            $song->title= Input::get('title');
            $song->description = Input::get('description');
            $song->genre =Input::get('genre');

        
            $youtube = Input::get('youtube');
            $vid= $song->getYoutube($youtube);
            $song->youtube= $vid;

            $tags= new Tag;
            $tags->name= Input::get('tags');
            $tags->type = 'Song';
            $song->tags()->save($tags);

        
            $imag= Input::file('image');

            $filename = str_random(12);
            $desPath= public_path('img/songs/images/');
            $upload_success =$imag->move($desPath, $filename);
            $song->image='img/songs/images/'.$filename; 
            $song->save();

            return Redirect::to('/profile')
            ->with('notices', 'New song added!!!');
     }

        //return Redirect::to('/song/edit/{$song}')
     //->with('errors', $validator->messages())
        return Redirect::back()
       ->with('errors', $validator->messages())
        ->withInput(Input::except('image'));

     }

     public function delete(Song $song)
     {
        $user = Auth::user();
        return View::make('profile.songs.delete')
        ->with('song', $song)
        ->with('user', $user);
     }


     public function doDelete()
     {
       $song=Song::findorfail(Input::get('id'));
         
        if ($song) {
            File::delete('public/img/songs/'.$song->song);
            File::delete('public/img/songs/images'.$song->image);
             $song->delete();

               return Redirect::to('/profile')
                ->with('notices', 'Song deleted successfully');
    }

         return Redirect::to('/profile')
        ->with('errors', 'Error deleting song');

      
  }


  public function search()
    {
        $search =Input::get('s-term');
        $songs= Song::search($search)->paginate(10);

      
      $videos = Video::orderBy('id','desc')->paginate(10);
      $galleries= Gallery::orderBy('id','desc')->paginate(10);

     return View::make('layout.home')
     ->with('songs', $songs)
     ->with('galleries', $galleries)
     ->with('videos', $videos)
     ->with('notices', 'Results for song'. $search.' :');

     
        
    }

    public function editSong()
    {
      return View::make('song.upload');
    }

    public function updateSong()
    {
       $song =new Song;
       $song->title = Input::get('title');
       $song->description = Input::get('description');

        $file = Input::file('pic');

        $fileName = Str::random(12);
        $extension = $file->getClientOriginalExtension();
        $name = $fileName.'.'.$extension;

     
        $desPath=public_path('img/songs/');

        $song->image = 'img/songs/'.$name;
        $song->user()->associate(Auth::user());
        $song->save();
        $file->move($desPath,$name);
        
         return Redirect::to('/profile')
         ->with('noticeg', 'New Song added!!!');
    }


    public function newPost()
    {
        $this->layout->title = 'New Post';
        $this->layout->main = View::make('dash')->nest('content', 'posts.new');
    }
 
    public function editPost(Post $post)
    {
        $this->layout->title = 'Edit Post';
        $this->layout->main = View::make('dash')->nest('content', 'posts.edit', compact('post'));
    }
 
    public function deletePost(Post $post)
    {
        $post->delete();
        return Redirect::route('post.list')->with('success', 'Post is deleted!');
    }
 
    /* post functions */
    public function savePost()
    {
        $post = [
            'title' => Input::get('title'),
            'content' => Input::get('content'),
        ];
        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];
        $valid = Validator::make($post, $rules);
        if ($valid->passes())
        {
            $post = new Post($post);
            $post->comment_count = 0;
            $post->read_more = (strlen($post->content) > 120) ? substr($post->content, 0, 120) : $post->content;
            $post->save();
            return Redirect::to('admin/dash-board')->with('success', 'Post is saved!');
        }
        else
            return Redirect::back()->withErrors($valid)->withInput();
    }
 
    public function updatePost(Post $post)
    {
        $data = [
            'title' => Input::get('title'),
            'content' => Input::get('content'),
        ];
        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];
        $valid = Validator::make($data, $rules);
        if ($valid->passes())
        {
            $post->title = $data['title'];
            $post->content = $data['content'];
            $post->read_more = (strlen($post->content) > 120) ? substr($post->content, 0, 120) : $post->content;
            if(count($post->getDirty()) > 0) /* avoiding resubmission of same content */
            {
                $post->save();
                return Redirect::back()->with('success', 'Post is updated!');
            }
            else
                return Redirect::back()->with('success','Nothing to update!');
        }
        else
            return Redirect::back()->withErrors($valid)->withInput();
    }
 
}