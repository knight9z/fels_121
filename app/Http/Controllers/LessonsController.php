<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonCreateRequest;
use App\Http\Requests\LessonUpdateRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Lesson\LessonRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class LessonsController extends CommonsController
{
    protected $lessonRepository;
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository, LessonRepositoryInterface $lessonRepository)
    {
        parent::__construct();
        $this->lessonRepository = $lessonRepository;
        $this->categoryRepository = $categoryRepository;
        $this->viewFolder = 'backend.lesson';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = $this->lessonRepository->getAllWithPage($this->input);
        return $this->_renderView('index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getList([], ['id']);
        return $this->_renderView('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonCreateRequest $request)
    {
        $rawData = $request->all();
        $responseFromRepository = $this->lessonRepository->createItem($rawData);

        if ($responseFromRepository['error']) {
            return $this->_redirectWithAction('CategoriesController', 'update', $rawData, [$responseFromRepository['message']]);

        } else {
            Session::flash('success', trans('backend/layout.message_success'));
            return $this->_redirectWithAction('LessonsController','index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categoryRepository->getList([], ['id']);
        $lesson = $this->lessonRepository->getDetail($id);
        return $this->_renderView('edit', compact('categories', 'lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LessonUpdateRequest $request, $id)
    {
        $rawData = $request->all();
        $responseFromRepository = $this->lessonRepository->updateItem($id, $rawData);

        if($responseFromRepository['error']){
            return $this->_redirectWithAction('LessonsController', 'update', $rawData, [$responseFromRepository['message']]);

        } else {
            Session::flash('success', trans('backend/layout.message_success'));
            return $this->_redirectWithAction('LessonsController','index');

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
        $this->lessonRepository->deleteItem($id);
        Session::flash('success', trans('backend/layout.message_success'));

        return $this->_redirectWithAction('LessonsController', 'index');
    }
}
