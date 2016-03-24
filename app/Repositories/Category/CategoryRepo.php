<?php
namespace App\Repositories\Category;

use App\Category;
use App\Repositories\AbstractEloquentRepository;

class CategoryRepo extends AbstractEloquentRepository implements CategoryRepoInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

}