<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const USER_ROLE_ADMIN = 1;
    const USER_ROLE_USER = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'avatar'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * check email
     * @param $mailName
     * @return mixed
     */
    public function getUserByEmail ($mailName)
    {
        return User::where('email', $mailName)->first();
    }

    /**
     * @return bool
     */
    public function isAdmin ()
    {
        return $this->role == self::USER_ROLE_ADMIN;
    }

    /**
     * @return bool
     */
    public function isUser ()
    {
        return $this->role == self::USER_ROLE_USER;
    }
}
