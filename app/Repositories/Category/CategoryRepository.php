<?php
namespace App\Repositories\Category;

use App\Category;
use App\Repositories\EloquentRepository;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

}