<?php
class VideoController extends BaseController
{
 
    /* get functions */
    public function index()
    {
        $videos = Video::orderBy('id','desc')->paginate(10);
        $musics=  Video::where('video_type', '=', 'Music-video')->take(3)->orderBy('id','desc')->get();
        $dances=  Video::where('video_type', '=', 'Dance')->take(3)->orderBy('id','desc')->get();
        $comedies=Video::where('video_type', '=', 'Comedy')->take(3)->orderBy('id','desc')->get();
       
        return View::make('video.index', ['musics'=>$musics,'dances'=>$dances, 'comedies'=>$comedies]);
    }

    public function getNew()
    {
        if (Auth::check()) {
        
            $user = Auth::user();      
            $v_count= $user->videos()->count();
                if ($v_count < 10 ) {
                     return View::make('video.video-upload');
                }
                else {
                return View::make('notice');
            }
        }

                else {
            return Redirect::to('/profile/#error')->with('error', 'Something wrong with upload');
        }

     }


    public function showVideo(Video $video)
    {
         
        $id= $video->id;
        $type= $video->video_type;
        $reVideos =  Video::where('video_type', '=', $type)->take(5)->orderBy('id','desc')->get();

         return View::make('video.single')
        ->with('video',$video)
        ->with('type', $type)
        ->with('reVideos',$reVideos);
       
    }

    function postArtCreate()
    {
        $video = [
            'youtube' => Input::get('youtube'),
            'video' => Input::file('video'),
        ];

        $rules = [
            'youtube' => 'min:5'|'required_without:video',
            'video'=> 'mimes:mp4,avi,mpeg,ogg,quicktime,wmv, x-flv'|'required_without:youtube',
        ];

        $validator = Validator::make($video, $rules);
        if ($validator->passes())
        {
            $video = new Video;
            $youtube = Input::get('youtube');
            $vid= $video->getYoutube($youtube);

            $video->youtube= $vid;


             if (Input::hasFile('video'))
             {
            $vid= Input::file('video');
            $extension = $vid->getClientOriginalExtension();
        $filename = str_random(12);
        $name = $filename.'.'.$extension;
            $desPath=public_path('img/videos/');
            $upload_success =$vid->move($desPath,$name);
            $video->video ='img/videos/'.$name;
            
                if (! isset($video->video))
                { 
                 return Redirect::to('/video/upload')
                ->with('errorv', 'Problem with your video upload');
                }
              }

            $video->user()->associate(Auth::user());
            $video->save();


            return View::make('video.last-upload')
            ->with('video', $video)
            ->with('noticev', 'New video added!!! Complete the remaining details below');
    
         }
        return Redirect::to('/video/upload')
        ->with('errorv', $validator->messages())
        ->withInput(Input::except('video'));

    }

         function postCreate()
    {

        $vid = [
            'title' => Input::get('title'),
            'description' => Input::get('description'),
            'image' => Input::file('image'),
            'video' =>Input::file('video'),
            'video_type' => Input::get('genre'),
            'youtube' => Input::get('youtube'),
        ];

        $rules = [
            'title' => 'required|min:3',
            'description'=> 'min:5',
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:3000',
            'video' => 'max:8000',
            'video_type' => 'required',
            'youtube' => 'min:5',
        ];

        $validator = Validator::make($vid, $rules);
        if ($validator->passes())
        {
            $video = new Video;
            $youtube = Input::get('youtube');
            $vid= $video->getYoutube($youtube);
            $video->youtube= $vid;

            $video->title = Input::get('title');
            $video->description=Input::get('description');
            $video->video_type=Input::get('genre');

            $vid= Input::file('video');
            $vid_name = $vid->getClientOriginalName();
            $name = Str::random(6).'_'. $vid_name;
            $desPath= public_path('img/videos/');
            $upload_success =$vid->move($desPath,$name);
            $video->video ='img/videos/'.$name;
            
            $imag= Input::file('image');
            $imag_name = $imag->getClientOriginalName();
            $name = Str::random(6).'_'.$imag_name;
            $desPath= public_path('img/videos/images/');
            $upload_success =$imag->move($desPath, $name);
            $video->image='img/videos/images/'.$name; 
            $video->user()->associate(Auth::user());
            $video->save(); 

             return Redirect::to('/profile'.'#videos')
             ->with('noticev', 'New video added!!!'); 
            
         }
        return Redirect::to('/video/upload')
        ->with('errorv', $validator->messages())
        ->withInput(Input::only('title','description','youtube','genre'));

    }

    function postDoEdit($id)
    {

        $vid = [
            'youtube' => Input::get('youtube'),
            'image' => Input::file('image'),
            'video_type' => Input::get('genre'),
        ];

        $rules = [
            'youtube' => 'min:2',
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
            'video_type' => 'required',
        ];

        $validator = Validator::make($vid, $rules);
        if ($validator->passes())
        {
            $video =Video::findOrFail($id);
            $video->youtube = Input::get('youtube');
            $video->video_type=Input::get('genre');

            $tags= new Tag;
            $tags->name= Input::get('tags');
            $tags->video_id = $tags->video->id;
            $tags->save();


            $image= Input::file('image');

            $filename = str_random(12);
            $desPath= public_path('img/videos/images');
            $upload_success =$image->move($desPath, $filename);
            $video->song_art='img/videos/images'.$filename; 
            $video->user()->associate(Auth::user());
            $video->save(); 

              return Redirect::to('/profile')
             ->with('noticev', 'New video added!!!');
            
          }
        return Redirect::to('/video/upload')
        ->with('errorv', $validator->messages());
       

    }
 
    public function search()
    {
        $search =Input::get('s-term');
        $video= Video::search($search)->paginate(10);

      
      $songs = Song::orderBy('id','desc')->paginate(10);
      $galleries= Gallery::orderBy('id','desc')->paginate(10);

     return View::make('layout.home')
     ->with('songs', $songs)
     ->with('galleries', $galleries)
     ->with('videos', $videos);
     
        
    }

     public function edit(Video $video)
     {
        return View::make('profile.videos.edit')
        ->with('video', $video);
     }
 
    public function delete(Video $video)
     {
        $user = Auth::user();
        return View::make('profile.videos.delete')
        ->with('video', $video)
        ->with('user', $user);
     }

     public function doDelete()
     {
       $video=Video::findorfail(Input::get('id'));
         
        if ($video) {
            File::delete('public/img/videos/'.$video->video);
            File::delete('public/img/videos/images/'.$video->image);

             $video->delete();

               return Redirect::to('/profile')
                ->with('notices', 'Video deleted successfully');
    }

         return Redirect::to('/profile')
        ->with('errors', 'Error deleting video');

      
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