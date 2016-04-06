<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Common
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'relationships';

    /**
     * Don't forget to fill this array
     *
     * @var array
     */
    protected $fillable = ['follower_id', 'following_id'];

    /**
     * @var array
     */
    protected $updateFields = ['follower_id', 'following_id'];

    protected $filterFields = ['follower_id', 'following_id'];


    public function follower_users()
    {
        return $this->belongsTo(User::class, 'follower_id', 'id');
    }

    public function following_users()
    {
        return $this->belongsTo(User::class, 'following_id', 'id');
    }

    public function createItem($rawData)
    {
        try {
            $object = $this::updateOrCreate($rawData, $rawData);

            //TODO : In the classes extend, we can continue process data (if it is necessary)
            return $object;

        } catch ( \Exception $e) {
            throw $e;

        }

    }

    public function getListUser($filter)
    {
        $query = $this->_queryBuild(['following_id'], $filter);

        return $query->lists('following_id');

    }
}
