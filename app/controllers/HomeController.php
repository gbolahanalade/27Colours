<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
	
     	$songs = Song::orderBy('id','desc')->paginate(6);
		  $songs->getFactory()->setViewName('pagination::simple');
		  $tags = Tag::lists('name', 'id');
       
        $videos= Video::orderBy('id', 'desc')->paginate(6);
        $videos->getFactory()->setViewName('pagination::simple');

        $galleries = Gallery::orderBY('id', 'desc')->paginate(6);
        $galleries->getFactory()->setViewName('pagination::simple');


		 return View::make('layout.home')
		 ->with('songs', $songs)
		 ->with('videos', $videos)
		 ->with('tags',$tags)
		 ->with('galleries', $galleries);
        
	}

		public function loginWithGoogle()
    {
      OAuth::login('google', function($user, $details) {
    $user->nickname = $details->nickname;
    $user->name = $details->firstName . ' ' . $details->lastName;
    $user->profile_image = $details->imageUrl;
    $user->save();
});
    }
   		
      /*{
   			if (Auth::check())
   		{
   			return Redirect::to('/profile');
   		}

       		$code = Input::get('code');

      		 $googleService = OAuth::consumer('Google','http://localhost:8060/users/login/go');
      		 if ( !empty( $code ) )
       {
          $token = $googleService->requestAccessToken( $code );
      	  $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );
          //$result = json_decode( $googleService->request( 'https://www.google.com/m8/feeds/contacts/default/full' ), true );
          // Check to see if user already exists
        if($user = User::where('email', '=', $result['email'])->first())
        {
            $user = User::find($user['id']);
            Auth::login($user);
            // If user isn't activated redirect them
            if ($user->confirmed == 1)
            {
                return View::make('/profile')->with('user', $user);
            }
                return Redirect::back()->withErrors(['Sorry You have not been approved',
                 'Check your email to access your confirmation link']);

       }
           else
        {
            // Create new user waiting for approval
            $new_user = new User();
            $new_user->email = $result['email'];
            $new_user->first_name = $result['given_name'];
            $new_user->username = $result['given_name'];
            $new_user->last_name = $result['family_name'];
            $new_user->googleID = $result['id'];
            $new_user->confirmed = 1;
            $new_user->save();

           return View::make('/profile')->with('user', $new_user);
        }


    }

       else {

         // get googleService authorization
         $url = $googleService->getAuthorizationUri();
         // return to google login url
         return Redirect::to( (string)$url );
       }
   }  */


   	public function loginWithFacebook() {

   		if (Auth::check())
   		{
   			return Redirect::to('/profile');
   		}

    	$code = Input::get( 'code' );

   		 $facebookService = OAuth::consumer( 'Facebook' );

    	// if code is provided get user data and sign in
    	if ( !empty( $code ) ) {
    	// This was a callback request from facebook, get the token
        $token = $facebookService->requestAccessToken( $code );
        // Send a request with it
        $result = json_decode( $facebookService->request( '/me' ), true );

         // Check to see if user already exists
        if($user = User::where('email', '=', $result['email'])->first())
        {
            $user = User::find($user['id']);
            Auth::login($user);
            // If user isn't activated redirect them
            if ($user->confirmed == 1)
            {
                return View::make('profile.index2');
            }
                return Redirect::back()->withErrors(['Sorry You have not been approved', 'Speak to 

your manager']);
        }
        else
        {
            // Create new user waiting for approval
            $new_user = new User();
            $new_user->email = $result['email'];
            $new_user->first_name = $result['first_name'];
            $new_user->surname = $result['last_name'];
            $new_user->facebookID = $result['id'];
            $new_user->facebook= $result['link'];
            $new_user->confirmed= 1;
            $new_user->save();
             return View::make('profile.index2');
        }

    }
    // if not ask for permission first
    else {
        // get googleService authorization
        $url = $facebookService->getAuthorizationUri();

        // return to google login url
        return Redirect::to( (string)$url );
    	}
	}


	public function loginWithSoundcloud() {

		if (Auth::check())
   		{
   			return Redirect::to('/profile');
   		}

    	$code = Input::get( 'code' );

   		 $soundcloudService = OAuth::consumer( 'Soundcloud' );

    	// if code is provided get user data and sign in
    	if ( !empty( $code ) ) {
    	// This was a callback request from facebook, get the token
        $token = $soundcloudService->requestAccessToken( $code );
        // Send a request with it
        $result = json_decode( $soundcloudService->request( 'me.json' ), true );

        $message = 'Your unique soundcloud user id is: ' . $result['id'] . ' and your first name is ' . $result['name'];
        echo $message. "<br/>";

        //Var_dump
        //display whole array().
        dd($result);

    }
    // if not ask for permission first
    else {
        // get googleService authorization
        $url = $soundcloudService->getAuthorizationUri();

        // return to google login url
        return Redirect::to( (string)$url );
    	}
	}  

}
