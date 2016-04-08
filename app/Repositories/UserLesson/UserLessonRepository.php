<?php

namespace App\Repositories\UserLesson;

use App\Repositories\EloquentRepository;
use App\UserLesson;

class UserLessonRepository extends EloquentRepository implements UserLessonRepositoryInterface
{
    public function __construct(UserLesson $userLesson)
    {
        $this->model = $userLesson;
    }

    public function getListWordCorrectAnswer($userId)
    {
        $listWord = [];
        $filter = ['user_id' => $userId];
        $userLessons = $this->getList($filter);

        foreach ($userLessons as $userLesson) {
            foreach ($userLesson->result as $result) {
                if ($result->is_correct) {
                    $listWord[] = $result->word_id;
                }
            }
        }

        return $listWord;
    }
}