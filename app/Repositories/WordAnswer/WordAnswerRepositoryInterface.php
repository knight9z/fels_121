<?php

namespace App\Repositories\WordAnswer;

interface WordAnswerRepositoryInterface
{
    public function getRandomWordAnswer($correctAnswerId);
}