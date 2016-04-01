<?php

namespace App\Repositories\Word;

use App\Lesson;
use App\Repositories\EloquentRepository;
use App\Word;

class WordRepository extends EloquentRepository implements WordRepositoryInterface
{
    public function __construct(Word $word)
    {
        $this->model = $word;
    }

    public function searchByLesson($lessonId, $wordKeySearch)
    {
        //get info lesson
        $lesson = Lesson::find($lessonId);
        if (isset($lesson) && $lesson) {
           $data = $this->model->searchByCategory($lesson->category_id, $wordKeySearch);

            return $data;
        }

        return [];
    }
}