<?php
namespace App\Repositories\Category;

use App\Category;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * @param $rawData
     * @return array
     * @throws \Exception
     */
    public function createItem($rawData)
    {
        //upload image
        $dataUpLoad = $this->_uploadImage('category');

        if ($dataUpLoad['error']) {
            return ['error' => true, 'message' => $dataUpLoad['message']];
        }
        //add data
        $rawData['image'] = $dataUpLoad['data'];

        $objectData = parent::createItem($rawData);

        return ['error' => false, 'data' => $objectData];
    }

    /**
     * @param $id
     * @param $rawData
     * @return array
     */
    public function updateItem($id, $rawData)
    {
        if (!empty(Input::file('image'))) {
            //upload image
            $dataUpLoad = $this->_uploadImage('user');

            if ($dataUpLoad['error']) {
                return ['error' => true, 'message' => $dataUpLoad['message']];
            }
            //add data
            $rawData['image'] = $dataUpLoad['data'];
        }
        $objectData = $this->model->updateItem($id, $rawData);

        return ['error' => false, 'data' => $objectData];
    }
}