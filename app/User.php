<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const USER_ROLE_ADMIN = 1;
    const USER_ROLE_MEMBER = 2;

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
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role == self::USER_ROLE_ADMIN;
    }

    /**
     * @return bool
     */
    public function isMember()
    {
        return $this->role == self::USER_ROLE_MEMBER;
    }

    /*
     * @param $id
     * @return bool
     */
    public function isMe($id)
    {
        return $this->id == $id;
    }

    /**
     * Create user
     *
     * @param $rawData
     * @return static
     */
    public function createItem($rawData)
    {
        return User::create($rawData);
    }
}
