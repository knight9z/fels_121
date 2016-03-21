<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepoInterface;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriesController extends CommonsController
{
    public function __construct(CategoryRepoInterface $categoryRepo)
    {
        parent::__construct();
        $this->useRepo = $categoryRepo;
        $this->viewFolder = 'category';
    }

    /**
     * @param Requests\CategoryRequest $request
     * @return mixed
     */
    public function store(Requests\CategoryRequest $request)
    {
        $object = $this->useRepo->createItem($request->all());

        //ToDo : we will process continue late
        return $object;
    }

    /**
     * @param Requests\CategoryRequest $request
     * @param $id
     * @return mixed
     */
    public function update(Requests\CategoryRequest $request, $id)
    {
        $responseData = $this->useRepo->updateItem($id, $request->all());

        return $responseData;
        //ToDo : we will process continue late
    }
}
