<?php
namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepoInterface;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends CommonsController
{
    /**
     * @var CategoryRepoInterface
     */
    public $categoryRepository;

    public function __construct(CategoryRepoInterface $categoryRepository)
    {
        parent::__construct();
        $this->categoryRepository = $categoryRepository;
        $this->viewFolder = 'category';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->categoryRepository->getAllWithPage($this->input);
        $responseData['result'] = $data;
        $this->_renderView('index', $responseData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->categoryRepository->getDetail($id);
        $responseData['result'] = $data;
        $this->_renderView('index', $responseData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->_renderView('create');
    }

    /**
     * @param CategoryRequest $request
     * @return mixed
     */
    public function store(CategoryRequest $request)
    {
        $object = $this->categoryRepository->createItem($request->all());
        CommonsController::redirectWithAction('CategoriesController', 'index');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
     {
         $data = $this->categoryRepository->getDetail($id);
         $responseData['result'] = $data;
         $this->_renderView('index', $responseData);
     }

    /**
     * @param CategoryRequest $request
     * @param $id
     * @return mixed
     */
    public function update(CategoryRequest $request, $id)
    {
        $responseData = $this->categoryRepository->updateItem($id, $request->all());
        CommonsController::redirectWithAction('CategoriesController', 'index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->deleteItem($id);
        CommonsController::redirectWithAction('CategoriesController', 'index');
    }
}
