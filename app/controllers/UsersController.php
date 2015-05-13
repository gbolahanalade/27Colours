<?php
use App\Lib\AuthenticateUser;


/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class UsersController extends BaseController
{
    /**
     * @var AuthenticateUser
     */
    private $authenticateUser;

    function __construct(AuthenticateUser $authenticateUser)
    {

        $this->authenticateUser = $authenticateUser;
    }

    /**
     * Displays the form for account creation
     *
     * @return  Illuminate\Http\Response
     */
    public function getCreate()
    {
        //return View::make(Config::get('confide::signup_form'));
        return View::make('users.register');
    }

    /**
     * Stores new account
     *
     * @return  Illuminate\Http\Response
     */
    public function postCreate()
    {
        $repo = App::make('UserRepository');
        $user = $repo->signup(Input::all());

        if ($user->id) {
            if (Config::get('confide::signup_email')) {
                Mail::queueOn(
                    Config::get('confide::email_queue'),
                    Config::get('confide::email_account_confirmation'),
                    compact('user'),
                    function ($message) use ($user) {
                        $message
                            ->to($user->email, $user->username)
                            ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                    }
                );
            }

            return Redirect::action('UsersController@getLogin')
                ->with('notice', Lang::get('confide::confide.alerts.account_created'));
        } else {
            $error = $user->errors()->all(':message');

            return Redirect::action('UsersController@getCreate')
                ->withInput(Input::except('password'))
                ->with('error', $error);
        }
    }

    /**
     * Displays the login form
     *
     * @return  Illuminate\Http\Response
     */
    public function getLogin()
    {
        //if (Confide::user()) {
         //   $user= Confide::user();
          //  return Redirect::to('/profile/{user}')
           // ->with('username', $username)
           // ->with('notice',  'Welcome to '.$username. ' your profile Page');
        return View::make('users.login'); 
          
    }

    /**
     * Attempt to do login
     *
     * @return  Illuminate\Http\Response
     */
    public function postLogin()
    {
        $repo = App::make('UserRepository');
        $input = Input::all();
       // $username=Input::get('username');
        

        if ($repo->login($input)) {
             $user= Confide::user();

            return Redirect::intended('/profile')
            ->with('user', $user)
            ->with('notice', 'You are now logged in');
        } else {
            if ($repo->isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ($repo->existsButNotConfirmed($input)) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::action('UsersController@getLogin')
                ->withInput(Input::except('password'))
                ->with('error', $err_msg);
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string $code
     *
     * @return  Illuminate\Http\Response
     */
    public function confirm($code)
    {
        if (Confide::confirm($code)) {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
            return Redirect::action('UsersController@getLogin')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
            return Redirect::action('UsersController@getLogin')
                ->with('error', $error_msg);
        }
    }

    /**
     * Displays the forgot password form
     *
     * @return  Illuminate\Http\Response
     */
    public function getForgotPassword()
    {
       // return View::make(Config::get('confide::forgot_password_form'));
        return View::make('users.forgot_password');
    }

    /**
     * Attempt to send change password link to the given email
     *
     * @return  Illuminate\Http\Response
     */
    public function postForgotPassword()
    {
        if (Confide::forgotPassword(Input::get('email'))) {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
            return Redirect::action('UsersController@getLogin')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
            return Redirect::action('UsersController@doForgotPassword')
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    /**
     * Shows the change password form with the given token
     *
     * @param  string $token
     *
     * @return  Illuminate\Http\Response
     */
    public function getResetPassword($token)
    {
        return View::make(Config::get('confide::reset_password_form'))
                ->with('token', $token);
    }

    /**
     * Attempt change password of the user
     *
     * @return  Illuminate\Http\Response
     */
    public function postResetPassword()
    {
        $repo = App::make('UserRepository');
        $input = array(
            'token'                 =>Input::get('token'),
            'password'              =>Input::get('password'),
            'password_confirmation' =>Input::get('password_confirmation'),
        );

        // By passing an array with the token, password and confirmation
        if ($repo->resetPassword($input)) {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
            return Redirect::action('UsersController@getLogin')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
            return Redirect::action('UsersController@getResetPassword', array('token'=>$input['token']))
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return  Illuminate\Http\Response
     */
    public function getLogout()
    {
        Confide::logout();

        return Redirect::to('/')
        ->with('notice', 'You have been logged out');
    }

    public function fblogin()
        {
            $facebook = new Facebook(Config::get('facebook'));
            $params = array(
          'redirect_uri' => url('users/login/fb/callback'),
            'scope' => 'email',
    );
         return Redirect::away($facebook->getLoginUrl($params));

      }

   public function fbcall()
        {
          $code = Input::get('code');
         if (strlen($code) == 0) return Redirect::to('/')->with('error', 'There was an error communicating with Facebook');

         $facebook = new Facebook(Config::get('facebook'));
         $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');
    $pic=$facebookService->request( ('/me/picture?type=large' ), true );
    //return  Redirect::to('/')->with('error', 'this user'. $me['name']. 'got here!!!');
    //$pic ='https://graph.facebook.com/'.$me['id'].'/picture?type=large';

    $user = User::whereUid($uid)->first();
//return  Redirect::to('/')->with('error', 'this user'. $user . ' got here!!!');
    if (empty($user)) {

        $user = new User();
        $user->name = $me['name'];
        $user->email = $me['email'];
        $user->photo ='https://graph.facebook.com/'.$me['id'].'/picture?type=large';
        $user->uid = $uid;

        $user->save();
    }

    $user->access_token = $facebook->getAccessToken();
    $user->save();

       if (Confide::user ()){

    return Redirect::to('/')->with('notice', 'Logged in with Facebook');
    }
    else{ 
     return Redirect::to('/')->with('error', 'Cannot create User');
        }
    
    }


    public function process($provider, $auth=null)
    {
        return $this->authenticateUser->execute($auth, $provider, $this);
    }


    private function userHasLoggedIn()
    {
        return Redirect::intended('/profile');
    }
}
