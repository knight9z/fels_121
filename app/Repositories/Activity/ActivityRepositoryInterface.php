<?php

namespace App\Repositories\Activity;

interface ActivityRepositoryInterface
{
    public function createItem($rawData);
    public function getAllWithPage($filter = [], $fields = ['*'], $perPage = 15);
}