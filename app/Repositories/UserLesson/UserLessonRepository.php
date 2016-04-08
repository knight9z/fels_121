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
}