<?php

namespace App;

class UserLesson extends Common
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_lessons';

    /**
     * Don't forget to fill this array
     *
     * @var array
     */
    protected $fillable = ['user_id', 'lesson_id', 'total_correct'];

    /**
     * @var array
     */
    protected $updateFields = ['user_id', 'lesson_id', 'total_correct'];

    /**
     * allowed filter field
     *
     * @var array
     */
    protected $filterFields = ['user_id', 'lesson_id', 'total_correct'];


    public function result()
    {
        return $this->hasMany(UserLessonResult::class);
    }

    public function createItem($rawData)
    {
        try {
            //extend function
            $object = parent::createItem($rawData);
            $rawData['user_lesson_id'] = $object->id;

            //create answer
            $userLessonResult = new UserLessonResult();
            $object->result = $userLessonResult->createItem($rawData);

            return $object;

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateItem($id, $rawData)
    {
        try {
            //extend function
            $object = parent::updateItem($id, $rawData);

            //update answer
            $userLessonResult = new UserLessonResult();
            $result = $userLessonResult->updateItem($id, $rawData['user_lesson_result']);

            if ($result['totalCorrect']) {
                $object->total_correct = $result['totalCorrect'];
                $object->save();

            }
            $object->result = $result;

            return $object;

        } catch (Exception $e) {
            throw $e;
        }
    }

}
