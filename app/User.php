<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

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
     * allowed filter field
     *
     * @var array
     */
    protected $filterFields = ['id', 'email', 'name', 'role'];


    public function follower()
    {
        return $this->hasMany(Relationship::class, 'follower_id', 'id');
    }

    public function following()
    {
        return $this->hasMany(Relationship::class, 'following_id', 'id');
    }
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

    /**
     * @param $filter
     * @param array $fields
     * @param int $perPage
     * @return mixed
     */
    public function getAllWithPage($filter, $fields = ['*'], $perPage = 15)
    {
        $query = $this->_queryBuild($fields = ['*'] , $filter);
        return $query->paginate($perPage);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDetail($id)
    {
        return User::find($id);
    }

    public function updateItem($id, $rawData)
    {
        try {
            $object = User::findOrFail($id);

            foreach ($this->fillable as $field) {
                if (isset($rawData[$field])) {
                    $object->{$field} = $rawData[$field];

                }
            }

            $object->save();

            //TODO : In the classes extend, we can continue process data (if it is necessary)
            return $object;

        } catch ( \Exception $e) {
            throw $e;

        }
    }

    public function deleteItem($id)
    {
        try {
            $object = User::findOrFail($id);
            $object->delete();

            //TODO : In the classes extend, we can continue process data (if it is necessary) and use soft delete
            return $object;

        } catch ( \Exception $e) {
            throw $e;

        }
    }


    public function countRecord($filter)
    {
        $query = $this->_queryBuild(['*'], $filter);
        return $query->count();
    }

}
