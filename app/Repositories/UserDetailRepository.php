<?php namespace App\Repositories;


use UserDetail;

class UserDetailRepository {


    public static function updateUserDetail($data, $user_id)
    {
        return UserDetail::where('user_id', $user_id)->update($data);
    }

    public static function createUserDetailRow($user_id)
    {
        return UserDetail::create(['user_id'=>$user_id]);
    }
}