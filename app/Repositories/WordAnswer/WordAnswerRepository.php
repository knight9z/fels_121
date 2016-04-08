<?php

namespace App\Repositories\WordAnswer;

use App\WordAnswer;

class WordAnswerRepository implements WordAnswerRepositoryInterface
{
    protected $wordAnswer;

    public function __construct(WordAnswer $wordAnswer)
    {
        $this->wordAnswer = $wordAnswer;
    }

    public function getRandomWordAnswer($correctAnswerId)
    {
        return $this->wordAnswer->getRandomWordAnswer($correctAnswerId);
    }
}