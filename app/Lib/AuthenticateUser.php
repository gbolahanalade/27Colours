<?php namespace App\Lib;


use Hybrid_Auth;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

define('APP_PATH', app_path());
define('SOCIAL_AUTH', APP_PATH . '/config/social_auth.php');
define('FB_AUTH', APP_PATH . '/config/fb_auth.php');
define('TW_AUTH', APP_PATH . '/config/twit_auth.php');
define('GG_AUTH', APP_PATH . '/config/gg_auth.php');

class AuthenticateUser
{

    CONST FACEBOOK = FB_AUTH;
    CONST TWITTER = TW_AUTH;
    CONST GOOGLE = GG_AUTH;



    function __construct()
    {

    }

    /**
     * Do the social login. if we have auth, redirect to the social login page
     * if not get the social user details.
     *
     * @param $auth
     * @param $provider
     * @param $listener
     */
    public function execute($auth, $provider, $listener)
    {


        //Do social auth
        try {

            if ($auth == 'auth') try { return $this->getAuthorizationFirst(); } catch (Exception $e){ dd($e->getMessage()); };

            try{
                $u = $this->getSocialUser($provider);
                $user = $this->userRepository->findByIdentifierOrCreate($u);
            } catch (\Exception $e)
            {
                Flash::overlay("Authentication failed! The user denied your request.","Authentication Failed");
                return Redirect::to('users/login');
            }


            //Auth::login($user, true);
            dd($user);

            Flash::overlay("You have been logged in successfully");
            return $listener->userHasLoggedIn($user);
        }catch (Exception $e) {
            Flash::overlay($e->getMessage());
            return $listener->userHasLoggedIn($user);
        }

    }

    private function getAuthorizationFirst()
    {
        return \Hybrid_Endpoint::process();
    }

    private function getSocialUser($provider)
    {
        switch (strtolower($provider)) {
            case 'facebook':
                $provider = 'Facebook';
                $config = FB_AUTH;
                break;
            case 'twitter':
                $provider = 'Twitter';
                $config = TW_AUTH;
                break;
            case 'google':
                $provider = 'Google';
                $config = GG_AUTH;
                break;
            default:
                $oauth = null;
                $config = null;
        }

        $oauth = new hybrid_Auth($config);
        $provider = $oauth->authenticate($provider);
        Session::put('social_auth', $config);
        return  $provider->getUserProfile();
    }

}