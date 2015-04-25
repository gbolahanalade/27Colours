<?php
class GalleryController extends BaseController
{
 
    /* get functions */
    public function index()
    {
       $modelling =  Gallery::where('cat', '=', 'modelling')->take(8)->orderBy('id','desc')->get();
          $others =  Gallery::where('cat', '=', 'others')->take(8)->orderBy('id','desc')->get();
            $gals =  Gallery::orderBy('id', 'desc')->take(8)->get();
       
        return View::make('gallery.index',['modelling'=>$modelling, 'others'=>$others,'gals'=>$gals]);
        
      }

   

    public function getNew()
    {
        if (Auth::check()) {
          $user = Auth::user();      
          $g_count= $user->galleries()->count();
                if ($g_count < 10 ) {

              return View::make('gallery.gallery_upload');
              }
              else {
                return View::make('notice');
            }
          }

        else {
            return Redirect::to('/profile/#error')->with('error', 'Please Login/ Signup to upload');
        }

     }

     public function showGallery(Gallery $gallery)
    {
         
        $id= $gallery->id;
      $cat= $gallery->cat;
      $reCats =  Gallery::where('cat', '=', $cat)->take(5)->orderBy('id','desc')->get();

        return View::make('gallery.single')
        ->with('gallery',$gallery)
        ->with('cat', $cat)
        ->with('reCats', $reCats);
       
    }

     public function postCreate()
     {
        $photo = [
            'caption' => Input::get('caption'),
            'image' => Input::file('image'),
            'category' =>Input::get('category'),
        ];

        $rules = [
            'caption' => 'min:2',
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
            'category' => 'required',
        ];

         $validator = Validator::make($photo, $rules);

        if ($validator->passes()) {
            $pic =new Gallery;
            $pic->caption = Input::get('caption');
            $pic->cat =Input::get('category');

             if (Input::hasFile('image'))
             {
        
            $image = Input::file('image');
            $filename = str_random(12);
            $extension = $image->getClientOriginalExtension();
            $name = $filename.'.'.$extension;
           
           // if ( ! File::exists($desPath)){
           
          // File::makeDirectory($desPath,  $mode = 0777, $recursive = false);
          // }
           $desPath=public_path('img/galleries/');

            $upload_success =$image->move($desPath,$name);
            $pic->image ='img/galleries/'.$name; 
            $pic->user()->associate(Auth::user());
            $pic->save();   

            return Redirect::to('/profile')
            ->with('noticeg', 'New Photos added!!!');

        }
        return Redirect::to('/gallery/upload')
        ->with('errors', $validator->messages())
        ->withInput();

         }
        return Redirect::to('/gallery/upload')
        ->with('errorg', $validator->messages());

    }

    public function editGallery()
    {
      return View::make('gallery.upload');
    }

    public function updateGallery()
    {
      /* $photo = [
            'caption' => Input::get('caption'),
            'image' => Input::file('image'),
        ];

        $rules = [
            'caption' => 'required|min:2',
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
        ];

        $validator = Validator::make($photo, $rules);

        if ($validator->passes()) 
        {    */
       $gallery =new Gallery;
       $gallery->caption = Input::get('caption');

        $file = Input::file('pic');

        $fileName = Str::random(12);
        $extension = $file->getClientOriginalExtension();
        $name = $fileName.'.'.$extension;

     
        $desPath= public_path('img/galleries/');

        $gallery->image = 'img/galleries/'.$name;
        $gallery->user()->associate(Auth::user());
        $gallery->save();
        $file->move($desPath,$name);
        
         return Redirect::to('/profile')
         ->with('noticeg', 'New Photos added!!!');
     // $gallery->image = 'http://localhost:8060/public/img'.$name;
    //  }
    //  return Redirect::to('/editGallery')
    //    ->with('errorg', $validator->messages());   

    }

     public function edit(Song $song)
     {
        return View::make('profile.songs.edit2')
        ->with('song', $song);
     }

     public function doEdit()
     {
            $song= Song::findorFail(Input::get('id'));
            $song->title= Input::get('title');
            $song->description = Input::get('description');
            $song->soundcloud_link =Input::get('soundcloud');
            $song->youtube_link = Input::get('youtube');
            $song->tags = Input::get('tags');
            $song->genre =Input::get('genre');

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
            File::delete('public/img/songs/'.$song->image);
             $song->delete();

               return Redirect::to('/profile')
                ->with('notices', 'Song deleted successfully');
    }

         return Redirect::to('/profile')
        ->with('errors', 'Error deleting song');

      
      //$songs= $user->songs()->idDescending()->get();

       // $song=Song::findorfail(Input::get('id'));
       // $song->delete();
  }



public function search()
    {
        $search =Input::get('s-term');
      
        $galleries= Gallery::search($search)->paginate(10);

      
      $videos = Video::orderBy('id','desc')->paginate(10);
      $songs= Song::orderBy('id','desc')->paginate(10);

     return View::make('layout.home')
     ->with('songs', $songs)
     ->with('galleries', $galleries)
     ->with('videos', $videos);

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