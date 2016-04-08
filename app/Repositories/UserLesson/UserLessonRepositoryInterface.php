<?php

namespace App\Repositories\UserLesson;


interface UserLessonRepositoryInterface
{
    public function getAllWithPage ($filter = [], $field = ['*'] ,$perPage = 15);
    public function getDetail ($id);
    public function updateItem ($id, $rawData);
    public function createItem ($rawData);
    public function deleteItem ($id);
    public function getListWordCorrectAnswer($userId);
}