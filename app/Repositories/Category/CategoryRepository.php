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


    public function createItem($rawData)
    {
        //upload image
        $dataUpLoad = $this->_uploadImage('user');

        if ($dataUpLoad['error']) {
            return ['error' => true, 'message' => $dataUpLoad['message']];
        }
        //add data
        $rawData['avatar'] = $dataUpLoad['data'];

        $objectData = parent::createItem($rawData);

        return ['error' => false, 'data' => $objectData];
    }
}