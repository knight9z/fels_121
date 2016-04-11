<?php

namespace App\Repositories\LessonWord;

use App\LessonWord;
use App\Repositories\EloquentRepository;
use App\Repositories\LessonWord\LessonWordRepositoryInterface;

class LessonWordRepository extends EloquentRepository implements LessonWordRepositoryInterface
{
    public function __construct(LessonWord $lessonWord)
    {
        $this->model = $lessonWord;
    }
}