<?php

use App\Lib\Forms\ProfileEditForm;
use App\Repositories\UserDetailRepository;

class ProfileController extends BaseController
{


    /**
     * @var ProfileEditForm
     */
    private $profileEditForm;
    /**
     * @var UserDetailRepository
     */
    private $userDetailRepository;

    function __construct(ProfileEditForm $profileEditForm, UserDetailRepository $userDetailRepository)
    {
        $this->beforeFilter('auth');
        $this->profileEditForm = $profileEditForm;
        $this->userDetailRepository = $userDetailRepository;
    }

    private function userDetails()
    {
        $user = $this->me();
        $user_details = [
            'firstname'         => $user->userdetails->firstname,
            'lastname'          => $user->userdetails->lastname,
            'talent'            => $user->userdetails->talents,
            'tagline'           => $user->userdetails->tagline,
            'facebookpage'      => $user->userdetails->facebook,
            'twitterpage'       => $user->userdetails->twitter,
            'soundcloudpage'    => $user->userdetails->soundcloud,
            'youtube'           => $user->userdetails->youtube,
        ];
        return (Object) $user_details;
    }

    public function index()
    {
        $user = $this->me();

        $songs = $user->songs()->idDescending()->get();
        $s_count = $user->songs()->count();
        $videos = $user->videos()->idDescending()->get();
        $v_count = $user->videos()->count();
        $galleries = $user->galleries()->idDescending()->get();
        $g_count = $user->galleries()->count();

        return View::make('profile.index2')
            ->with('songs',         $songs)
            ->with('s_count',       $s_count)
            ->with('galleries',     $galleries)
            ->with('g_count',       $g_count)
            ->with('videos',        $videos)
            ->with('v_count',       $v_count)
            ->with('user',          $user)
            ->with('user_details',  $this->userDetails())
            ;

    }


    public function show($id)
    {
        $user = User::findorFail($id);
        $songs = $user->songs()->idDescending()->get();
        $s_count = $user->songs()->count();
        $videos = $user->videos()->idDescending()->get();
        $v_count = $user->videos()->count();
        $galleries = $user->galleries()->idDescending()->get();
        $g_count = $user->galleries()->count();

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
        return View::make('profile.edit')
            ->with('user_details', $this->userDetails())
            ->with('user', $this->me())
            ;

//        if (Auth::check()) {
//            $user = Auth::user();
//            // $this->user = $user;
//            return View::make('profile.edit')->with('user', $user);
//        }
//        return Redirect::to('profile/')
//            ->with('errors', 'Error updating your details');
    }

    public function privacyPolicy()
    {
        return View::make('profile.privacy_policy');
    }


    public function doEdit()
    {
        $this->profileEditForm->validate(Input::all());

        //save details to user_details table
        $data = Input::only('firstname','lastname','talents','facebook','twitter','soundcloud','youtube','tagline');
        $this->userDetailRepository->updateUserDetail($data, $this->me()->id);

        Flash::overlay('Your profile has been saved', 'Success');
        return Redirect::to('profile');
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
            'image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif',
        ];

        $validator = Validator::make($picture, $rules);
        if ($validator->passes()) {

            $user_id = Input::get('id');
            $user = User::findorFail($user_id);
            $profilePhoto = $user->profilePhoto;

            $image = Input::file('image');
            $filename = str_random(12);
            $desPath = public_path('img/profile_photos/');
            $upload_success = $image->move($desPath, $filename);

            if (!isset($profilePhoto->image)) {
                $pic = new ProfilePhoto;
                $pic->image = 'img/profile_photos/' . $filename;
                $user->profilePhoto()->save($pic);

                return Redirect::to('/profile')
                    ->with('notices', 'profile photo added!!!');
            }
            if (isset($profilePhoto->image)) {

                $profilePhoto->image = 'img/profile_photos/' . $filename;

                $user->profilePhoto()->save($profilePhoto);
                return Redirect::to('/profile')
                    ->with('notices', ' profile photo updated!');
            }

        }
        return Redirect::to('/profile/upload')
            ->with('errors', $validator->messages())
            ->withInput(Input::except('image'));


    }
}

