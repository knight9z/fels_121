<?php

namespace App\Repositories\Lesson;

interface LessonRepositoryInterface
{
    public function getAllWithPage ($filter, $perPage);
    public function getDetail ($id);
    public function updateItem ($id, $rawData);
    public function createItem ($rawData);
    public function deleteItem ($id);
}
