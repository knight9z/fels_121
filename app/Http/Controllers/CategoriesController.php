<?php
namespace App\Http\Controllers;

use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Http\Requests\CategoryCreateRequest;
use Illuminate\Support\Facades\Session;

class CategoriesController extends CommonsController
{
    /**
     * @var CategoryRepoInterface
     */
    public $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        parent::__construct();
        $this->categoryRepository = $categoryRepository;
        $this->viewFolder = 'backend.category';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAllWithPage($this->input);
        return $this->_renderView('index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->getDetail($id);
        $this->_renderView('index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->_renderView('create');
    }

    /**
     * @param CategoryCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryCreateRequest $request)
    {
        $rawData = $request->all();
        $responseFromRepository = $this->categoryRepository->createItem($request->all());

        if ($responseFromRepository['error']) {
            return $this->_redirectWithAction('CategoriesController', 'update', $rawData, [$responseFromRepository['message']]);

        } else {
            Session::flash('success', trans('backend/layout.message_success'));
            return $this->_redirectWithAction('CategoriesController','index');

        }
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
     {
         $category = $this->categoryRepository->getDetail($id);
         return $this->_renderView('edit', compact('category'));
     }

    /**
     * @param CategoryUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $rawData = $request->all();
        $responseFromRepository = $this->categoryRepository->updateItem($id, $rawData);

        if ($responseFromRepository['error']) {
            return $this->_redirectWithAction('CategoriesController', 'update', $rawData, [$responseFromRepository['message']]);

        } else {
            Session::flash('success', trans('backend/layout.message_success'));
            return $this->_redirectWithAction('CategoriesController','index');

        }
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
        Session::flash('success', trans('backend/layout.message_success'));

        return $this->_redirectWithAction('CategoriesController', 'index');
    }

}
