<?php
/**
 * Created by PhpStorm.
 * User: FRAMGIA\nguyen.viet.anhb
 * Date: 18/03/2016
 * Time: 15:32
 */

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