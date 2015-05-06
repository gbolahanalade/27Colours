<?php
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 *
 * This service abstracts some interactions that occurs between Confide and
 * the Database.
 */
class UserRepository
{
    private $app;

    function __construct()
    {
        $this->app = app();
    }


    public function registerSocialUSer(Hybrid_User_Profile $user, $provider)
    {
        //register username || email || confirmed=>1 ||
        //check if user exists
        $t = Confide::getUserByEmailOrUsername(['email'=>$user->email]);

        if ( ! null == $t)
        {
            return $t;
        }

        //create user
        $u = new User;
        $u->username =  $this->coverSpace($this->lowerCase($user->displayName));
        $u->email = $user->email;
        $u->is_socialuser = 1;
        $u->confirmed = 1;
        $r = $this->save($u,false);

        //store user_details
        $user_detail = [
            'user_id' => $u->id,
            'firstname' => $this->lowerCase($user->firstName),
            'lastname' => $this->lowerCase($user->lastName),
            "$provider" => $user->profileURL,
            "$provider" . 'ID' => $user->identifier
        ];
        UserDetail::create($user_detail);

        return $u;
    }


    private function coverSpace($text)
    {
        return str_replace(" ", "_", $text);
    }

    private function lowerCase($text){return strtolower($text);}

    /**
     * Signup a new account with the given parameters
     *
     * @param  array $input Array containing 'username', 'email' and 'password'.
     *
     * @return  User User object that may or may not be saved successfully. Check the id to make sure.
     */
    public function signup($input)
    {
        $user = new User;

        $user->username = array_get($input, 'username');
        $user->email = array_get($input, 'email');
        $user->password = array_get($input, 'password');

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = array_get($input, 'password_confirmation');

        // Generate a random confirmation code
        $user->confirmation_code = md5(uniqid(mt_rand(), true));

        // Save if valid. Password field will be hashed before save
        //@NOTE pass validate=true for validation to be performed.
        //Confide trait is greedy and will not allow users to be created without being validated. Social users can be trusted so we dont need to validate them.
        $this->save($user,$validate=true);

        return $user;
    }

    /**
     * Attempts to login with the given credentials.
     *
     * @param  array $input Array containing the credentials (email/username and password)
     *
     * @return  boolean Success?
     */
    public function login($input)
    {
        if (!isset($input['password'])) {
            $input['password'] = null;
        }

        return Confide::logAttempt($input, Config::get('confide::signup_confirm'));
    }

    /**
     * Checks if the credentials has been throttled by too
     * much failed login attempts
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Is throttled
     */
    public function isThrottled($input)
    {
        return Confide::isThrottled($input);
    }

    /**
     * Checks if the given credentials correponds to a user that exists but
     * is not confirmed
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Exists and is not confirmed?
     */
    public function existsButNotConfirmed($input)
    {
        $user = Confide::getUserByEmailOrUsername($input);

        if ($user) {
            $correctPassword = Hash::check(
                isset($input['password']) ? $input['password'] : false,
                $user->password
            );

            return (!$user->confirmed && $correctPassword);
        }
    }

    /**
     * Resets a password of a user. The $input['token'] will tell which user.
     *
     * @param  array $input Array containing 'token', 'password' and 'password_confirmation' keys.
     *
     * @return  boolean Success
     */
    public function resetPassword($input)
    {
        $result = false;
        $user = Confide::userByResetPasswordToken($input['token']);

        if ($user) {
            $user->password = $input['password'];
            $user->password_confirmation = $input['password_confirmation'];
            $result = $this->save($user);
        }

        // If result is positive, destroy token
        if ($result) {
            Confide::destroyForgotPasswordToken($input['token']);
        }

        return $result;
    }

    /**
     * Simply saves the given instance
     *
     * @param  User $instance
     *
     * @return  boolean Success
     */
    public function save(User $instance)
    {
        return $instance->save();
    }
}
