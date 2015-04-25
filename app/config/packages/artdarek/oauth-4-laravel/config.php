<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => '941520272544256',
            'client_secret' => '63adb423ec471cbe2e55233cec52e387',
            'scope'         => array('email', 'user_online_presence'),
        ),

        'Google'=> array(
        	'client_id'     => '1084020392055-o1nms4168i49aml04ijecnoctdss8d4l.apps.googleusercontent.com',
        	'client_secret' => 'XbErEARMkpuSsZj_-z_kTW5Y',
        	'scope'         => array('https://www.googleapis.com/auth/plus.me','https://www.googleapis.com/auth/plus.login','https://www.googleapis.com/auth/userinfo.profile','https://www.googleapis.com/auth/userinfo.email'),

        	),

        'Soundcloud'=>array(
        	'client_id'     => '',
        	'client_secret' => '',
        	'scope'         => array(''),


        	),		

	)

);