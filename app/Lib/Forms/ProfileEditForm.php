<?php namespace App\Lib\Forms;

use Laracasts\Validation\FormValidator;

class ProfileEditForm extends FormValidator {

    protected $rules = [
        'firstname'     => 'required|alpha',
        'lastname'      => 'required|alpha',
        'talents'       => 'alpha',
        'facebook'      => 'url',
        'twitter'       => 'url',
        'soundcloud'    => 'url',
        'youtube'       => 'url',
        'tagline'       => 'required',
    ];

} 