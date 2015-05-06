<?php

class UserDetail extends Eloquent {

    protected $table = 'user_details';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('User');
    }

} 