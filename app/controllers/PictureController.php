<?php
class PictureController extends BaseController
{
 
    /* get functions */
    public function index()
    {
       $modelling =  Picture::where('cat', '=', 'modelling')->take(8)->orderBy('id','desc')->get();
          $others =  Picture::where('cat', '=', 'others')->take(8)->orderBy('id','desc')->get();
            $gals =  Picture::orderBy('id', 'desc')->take(8)->get();
       
        return View::make('gallery.index',['modelling'=>$modelling, 'others'=>$others,'gals'=>$gals]);
        
      }

   

    public function getNew()
    {
        if (Auth::check()) {

        return View::make('gallery.gallery_upload2');
        }

        else {
            return Redirect::to('/profile/#error')->with('error', 'Please Login/ Signup to upload');
        }

     }

     public function showGallery(Picture $gallery)
    {
         
      $id= $gallery->id;
      $cat= $gallery->cat;
      $reCats =  Picture::where('cat', '=', $cat)->take(5)->orderBy('id','desc')->get();

        return View::make('gallery.single')
        ->with('gallery',$gallery)
        ->with('cat', $cat)
        ->with('reCats', $reCats);
       
    }

     public function postCreate()
     {
       /* $photo = [
            'caption' => $_REQUEST['cap'],
            'image'   => Input::file('image'),
            'song'    => Input::file('song'),
       ];

        $rules = [
           'caption'=> 'required|min:2',
            'image' => 'image|mimes:jpeg,jpg,bmp,png,gif',
            'song'  => 'mimes:mp3,aac,wav',
        ];
        */

      $image = Input::file('song');
      $music = Input::file('image');
      //  if(! isset($_POST["song"]) && $_POST["song"]["error"]== UPLOAD_ERR_OK)
       // {
       //   return $_FILES["song"];
       // }

  /*    $song_fileName = $_FILES['song']['name'];
      $song_fileType = $_FILES['song']['type'];
      $song_fileContent = file_get_contents($_FILES['song']['tmp_name']);
      $song_dataUrl = 'data:' . $song_fileType . ';base64,' . base64_encode($song_fileContent);

      $img_fileName = $_FILES['image']['name'];
     $img_fileType = $_FILES['image']['type'];
      $img_fileContent = file_get_contents($_FILES['image']['tmp_name']);
      $img_dataUrl = 'data:' . $img_fileType . ';base64,' . base64_encode($img_fileContent); */ 
//

    

   // $json = json_encode(array(
      //'song_name' => $music,
       // 'acct' => $acct,
       // 'user'=>$user,
    //  'img_name'  =>  $image,
   //   'song_type' => $song_fileType,
   //   'img_type'  => $img_fileType,
     // 'song_dataUrl' => $song_dataUrl,
    //  'img_dataUrl' => $img_dataUrl,
     // 'caption' => $_REQUEST['caption'],
     // 'caption' => Input::get('caption'),
    //  'category' =>Input::get('cat'),

      // ));
     // echo $json;  
      //$acct= $_POST['Groucho'];
     // $user=$_POST['accountnum'];

    //  echo $acct.$user;

      //   $validator = Validator::make($photo, $rules);

       // if ($validator->passes()) {
           
            // Create and save a new user, mass assigning all of the input fields (including the 'avatar' file field).
          
          $pic =new Picture;
          $pic->caption = Input::get('caption');
          $pic->cat= Input::get('cat');

          $song_fileName2=$music->getClientOriginalName();
          $img_fileName2=$image->getClientOriginalName();

         $song_fileName3 = Str::random(6).'_'.$song_fileName2;
         $img_fileName3  = Str::random(6).'_'.$img_fileName2;
         
        $img_desPath= public_path('img/galleries/');
        $song_desPath= public_path('img/songs/');

        //move_uploaded_file($song_fileName, $song_desPath);
        //move_uploaded_file($img_fileName,  $img_desPath);
       
        $music->move($song_desPath, $song_fileName3);
        $image->move($img_desPath,  $img_fileName3);

         $pic->image = 'img/galleries/'.$img_fileName3;
         $pic->song = 'img/songs/'.$song_fileName3;
         $pic->user()->associate(Auth::user());
         $pic->save();

        return Redirect::to('/profile')
       ->with('noticeg', 'New Photos added!!!');
       }


       // return Redirect::to('/gallery/upload')
      //  ->withInput(Input::all())
      //  ->with('errorg', $validator->messages());

    // }

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