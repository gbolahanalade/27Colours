<?php

return array(
	'table' => 'oauth_identities',
	'providers' => array(
		'facebook' => array(
			'id' => '12345678',
			'secret' => 'y0ur53cr374ppk3y',
			'redirect' => URL::to('your/facebook/redirect'),
			'scope' => array(),
		),
		'google' => array(
			'id' => '1084020392055-o1nms4168i49aml04ijecnoctdss8d4l.apps.googleusercontent.com',
			'secret' => 'XbErEARMkpuSsZj_-z_kTW5Y',
			'redirect' => URL::to('users/login/go'),
			'scope' => array(),
		),
		'github' => array(
			'id' => '12345678',
			'secret' => 'y0ur53cr374ppk3y',
			'redirect' => URL::to('your/github/redirect'),
			'scope' => array(),
		),
		'linkedin' => array(
			'id' => '12345678',
			'secret' => 'y0ur53cr374ppk3y',
			'redirect' => URL::to('your/linkedin/redirect'),
			'scope' => array(),
		),
		'instagram' => array(
			'id' => '12345678',
			'secret' => 'y0ur53cr374ppk3y',
			'redirect' => URL::to('your/instagram/redirect'),
			'scope' => array(),
		),
	)
);
