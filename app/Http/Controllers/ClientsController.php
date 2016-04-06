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
    protected $lessonRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository, LessonRepositoryInterface $lessonRepository)
    {
        parent::__construct();
        $this->viewFolder = 'frontend';
        $this->categoryRepository = $categoryRepository;
        $this->lessonRepository = $lessonRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $currentUser = Auth::user();
        return $this->_renderView('index', compact('currentUser'));
    }

    public function category()
    {
        $currentUser = Auth::user();
        $categories = $this->categoryRepository->getAllWithPage($this->input);
        return $this->_renderView('category.index', compact('categories', 'currentUser'));
    }

    public function lesson($categoryId)
    {
        $currentUser = Auth::user();
        $lessons = $this->lessonRepository->getAllWithPage(['category_id' => $categoryId]);
        return $this->_renderView('lesson.index', compact('currentUser', 'lessons'));
    }


}
