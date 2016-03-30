<?php

namespace App\Repositories\Lesson;

use App\Lesson;
use App\Repositories\EloquentRepository;

class LessonRepository extends EloquentRepository implements LessonRepositoryInterface
{
    public function __construct(Lesson $lesson)
    {
        $this->model = $lesson;
    }


}