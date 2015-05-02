<?php

return [
    'base_url' => 'http://29cols.app/login/auth', //without /auth this url should be used on google apps oauth settings
    'providers' => [
        'Google' => [
            'enabled' => true,
            'keys' => ['id'=>'', 'secret'=>''],
            'scope' => 'https://www.googleapis.com/auth/userinfo.profile' . 'https://www.googleapis.com/auth/userinfo.email'
        ],
    ],
];