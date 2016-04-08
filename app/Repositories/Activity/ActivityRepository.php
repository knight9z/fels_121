<?php

namespace App\Repositories\Activity;

use App\Activity;
use App\Repositories\EloquentRepository;

class ActivityRepository extends EloquentRepository implements ActivityRepositoryInterface
{
    public function __construct(Activity $activity)
    {
        $this->model = $activity;
    }

    public function getAllWithPage($filter = [], $fields = ['*'], $perPage = 15)
    {
        return $this->model->getAllWithPage ($filter, $fields, $perPage);
    }
}