<?php

namespace App\Repositories\Word;

use App\Repositories\EloquentRepository;
use App\Word;

class WordRepository extends EloquentRepository implements WordRepositoryInterface
{
    public function __construct(Word $word)
    {
        $this->model = $word;
    }
}