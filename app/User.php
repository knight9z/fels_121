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
     * allowed filter field
     *
     * @var array
     */
    protected $filterFields = ['id', 'email', 'name', 'role'];


    /**
     * build query
     * @param array $fields
     * @param array $filter
     * @param string $orderBy
     * @return mixed
     */
    protected function _queryBuild ($fields = ['*'], $filter = [], $orderBy = 'id')
    {
        $query = $this::select($fields);

        foreach ($this->filterFields as $field) {
            if (isset($filter[$field])) {
                $query = $query->where($field, $filter[$field]);

            }
        }

        $query = $query->orderBy($orderBy);

        return $query;
    }


    /**
     * check email
     * @param $mailName
     * @return mixed
     */
    public function getUserByEmail($mailName)
    {
        return User::where('email', $mailName)->first();
    }

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
    public function isUser()
    {
        return $this->role == self::USER_ROLE_USER;
    }


    public function getAllWithPage($filter, $fields = ['*'], $perPage = 15)
    {
        $query = $this->_queryBuild($fields = ['*'] , $filter);
        return $query->paginate($perPage);
    }

    public function getDetail($id)
    {
        return User::find($id);
    }
}
