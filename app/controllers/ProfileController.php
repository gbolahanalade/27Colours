<?php

class ProfileController extends BaseController {

  /*
  */

  public function index()
  {
    if (Auth::check())  {
     $user = Auth::user();      
     $songs= $user->songs()->idDescending()->get();
     $s_count= $user->songs()->count();
     $videos= $user->videos()->idDescending()->get();
     $v_count= $user->videos()->count();
     $galleries= $user->galleries()->idDescending()->get();
     $g_count= $user->galleries()->count();
      
     return View::make('profile.index2')
     ->with('songs', $songs)
     ->with('s_count', $s_count)
     ->with('galleries', $galleries)
     ->with('g_count', $g_count)
     ->with('videos', $videos)
     ->with('v_count',$v_count)
     ->with('user', $user);

   }
   else{
    return Redirect::to('users/login');

   }
  
 }

 public function show($id)
 {    
      $user=User::findorFail($id);
      $songs= $user->songs()->idDescending()->get();
      $s_count= $user->songs()->count();
      $videos= $user->videos()->idDescending()->get();
      $v_count= $user->videos()->count();
      $galleries= $user->galleries()->idDescending()->get();
      $g_count= $user->galleries()->count();
      
     return View::make('profile.index2_logout')
     ->with('songs', $songs)
     ->with('s_count', $s_count)
     ->with('galleries', $galleries)
     ->with('g_count', $g_count)
     ->with('videos', $videos)
     ->with('v_count', $v_count)
     ->with('user', $user);
    }

    public function notice()
    {
      return View::make('notice');
    }

  public function edit()
  {
    if (Auth::check())  {
     $user = Auth::user();
   // $this->user = $user;
    return View::make('profile.edit')->with('user', $user);
  }
     return Redirect::to('profile/')
     ->with('errors', 'Error updating your details');
}

public function privacyPolicy()
 {
  return View::make('profile.privacy_policy');
}


  public function doEdit()
  {
    $data = [
            'talent' => Input::get('talents'),
            'first_name' => Input::get('fname'),
            'last_name' => Input::get('lname')
        ];

    $rules = [
            'talent' => 'required|min:2',
            'first_name'=> 'required|min:2',
            'last_name'=> 'required|min:2'
        ];

        $valid = Validator::make($data, $rules);
        if ($valid->passes())
{
    //$user= User::findorFail(Input::get('id'));
    $id=Auth::id();
    $user= User::findorFail($id);

    $user->first_name= $data['first_name'];
    $user->last_name= $data['last_name'];
    $user->talents= $data['talent'];
    $user->username= Input::get('username');
    $user->tagline= Input::get('tagline');
    $user->facebook=Input::get('facebook');
    $user->twitter=Input::get('twitter');
    $user->soundcloud=Input::get('soundcloud');
    $user->youtube=Input::get('youtube');

    $user->save();

    return Redirect::to('/profile')
    ->with('notices','Successfully updated your page');
}
else{
      return Redirect::back()
      ->with('errors', $valid->messages())
      ->withInput();
  }
}


  public function getPhoto()
  {
       $user = Auth::user();
      return View::make('profile.photo_upload')
      ->with('user', $user);
  }


  public function doGetPhoto()
  {
    
      $picture = [
           'image' => Input::file('image'),
        ];

        $rules = [
             'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
        ];

        $validator = Validator::make($picture, $rules);
        if ($validator->passes())
         {

          $user_id= Input::get('id');
          $user= User::findorFail($user_id);
          $profilePhoto = $user->profilePhoto; 

           $image= Input::file('image');
            $filename = str_random(12);
            $desPath =public_path('img/profile_photos/');
            $upload_success =$image->move($desPath, $filename);

          if (! isset($profilePhoto->image))
          {
          $pic= new ProfilePhoto;
          $pic->image ='img/profile_photos/'.$filename;
          $user->profilePhoto()->save($pic);

             return Redirect::to('/profile')
            ->with('notices', 'profile photo added!!!');
          }
          if(isset($profilePhoto->image))
           { 
                  
           $profilePhoto->image ='img/profile_photos/'.$filename;
            
           $user->profilePhoto()->save( $profilePhoto);
           return Redirect::to('/profile')
            ->with('notices', ' profile photo updated!');
           }
    
        }
         return Redirect::to('/profile/upload')
        ->with('errors', $validator->messages())
        ->withInput(Input::except('image'));
        

    }
}

