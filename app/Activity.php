<?php

namespace App;

class Activity extends Common
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activities';

    /**
     * Don't forget to fill this array
     *
     * @var array
     */
    protected $fillable = ['user_id', 'user_lesson_id'];

    /**
     * @var array
     */
    protected $updateFields = ['user_id', 'user_lesson_id'];

    protected $filterFields = ['user_id', 'user_lesson_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_lesson()
    {
        return $this->belongsTo(UserLesson::class);
    }

    public function getAllWithPage($filter = [], $fields = ['*'], $perPage = 15)
    {
        $query = $this->_queryBuild($fields, $filter);

        if (count($filter['following_id'])) {
            $query = $query->orWhere(function($query) use ($filter)
                        {
                            $query->whereIn('user_id', $filter['following_id']);
                        });
        }

        $items = $query->paginate($perPage);

        //TODO : In the classes extend, we can continue process data (if it is necessary). Maybe is multiple language
        return $items;
    }
}
