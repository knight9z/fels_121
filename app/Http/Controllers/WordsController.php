<?php

namespace App\Http\Controllers;

use App\Http\Requests\WordCreateRequest;
use App\Http\Requests\WordUpdateRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Word\WordRepositoryInterface;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class WordsController extends CommonsController
{
    protected $categoryRepository;
    protected $wordRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository, WordRepositoryInterface $wordRepository)
    {
        parent::__construct();
        $this->categoryRepository = $categoryRepository;
        $this->wordRepository = $wordRepository;
        $this->viewFolder = 'backend.word';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = $this->wordRepository->getAllWithPage();
        return $this->_renderView('index', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getList();
        return $this->_renderView('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WordCreateRequest $request)
    {
        $rawData = $request->all();
        $responseFromRepository = $this->wordRepository->createItem($rawData);

        if ($responseFromRepository['error']) {
            return $this->_redirectWithAction('WordsController', 'create', $rawData, [$responseFromRepository['message']]);

        } else {
            Session::flash('success', trans('backend/layout.message_success'));
            return $this->_redirectWithAction('WordsController', 'index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categoryRepository->getList();
        $word = $this->wordRepository->getDetail($id);
        return $this->_renderView('edit', compact('categories', 'word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WordUpdateRequest $request, $id)
    {
        $rawData = $request->all();
        $responseFromRepository = $this->wordRepository->updateItem($id, $rawData);

        if ($responseFromRepository['error']) {
            return $this->_redirectWithAction('WordsController', 'create', $rawData, [$responseFromRepository['message']]);

        } else {
            Session::flash('success', trans('backend/layout.message_success'));
            return $this->_redirectWithAction('WordsController', 'index');
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
        $this->wordRepository->deleteItem($id);
        Session::flash('success', trans('backend/layout.message_success'));

        return $this->_redirectWithAction('WordsController', 'index');
    }


    public function searchByLesson($lessonId)
    {
        $wordKeySearch = Input::get('q');
        $responseFromRepository = $this->wordRepository->searchByLesson($lessonId, $wordKeySearch);
        return response()->json($responseFromRepository);
    }
}
