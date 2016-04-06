<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Lesson\LessonRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests;
use App\Repositories\Word\WordRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ClientsController extends CommonsController
{

    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        parent::__construct();
        $this->viewFolder = 'frontend';
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $currentUser = $this->currentUser;
       return $this->_renderView('index', compact('currentUser'));
    }

    public function category()
    {
        $currentUser = $this->currentUser;
        $categories = $this->categoryRepository->getAllWithPage($this->input);
        return $this->_renderView('category.index', compact('categories', 'currentUser'));
    }

}
