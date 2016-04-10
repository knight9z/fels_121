<?php

namespace App\Repositories\Word;

interface WordRepositoryInterface
{
    public function getAllWithPage($filter, $perPage);
    public function getDetail($id);
    public function updateItem($id, $rawData);
    public function createItem($rawData);
    public function deleteItem($id);
    public function countRecord($filter = []);
}