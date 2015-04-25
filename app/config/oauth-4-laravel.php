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
            'scope'         => array('email'),
        ),      

    )

);