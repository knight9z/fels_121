<?php

namespace App\Repositories\LessonWord;

use App\LessonWord;
use App\Repositories\EloquentRepository;
use App\Repositories\Lesson\LessonRepositoryInterface;

class LessonWordRepository extends EloquentRepository implements LessonRepositoryInterface
{
    public function __construct(LessonWord $lessonWord)
    {
        $this->model = $lessonWord;
    }


}