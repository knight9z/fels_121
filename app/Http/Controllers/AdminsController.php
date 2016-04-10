<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Lesson\LessonRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Word\WordRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminsController extends CommonsController
{
    protected $userRepositoryRepository;
    protected $lessonRepositoryRepository;
    protected $wordRepositoryRepository;
    protected $categoryRepositoryRepository;

    public function __construct(
        UserRepositoryInterface $userRepositoryRepository,
        LessonRepositoryInterface $lessonRepositoryRepository,
        WordRepositoryInterface $wordRepositoryRepository,
        CategoryRepositoryInterface $categoryRepositoryRepository
    )
    {
        parent::__construct();
        $this->viewFolder = 'backend';
        $this->userRepositoryRepository = $userRepositoryRepository;
        $this->lessonRepositoryRepository = $lessonRepositoryRepository;
        $this->wordRepositoryRepository = $wordRepositoryRepository;
        $this->categoryRepositoryRepository = $categoryRepositoryRepository;
    }

    public function index()
    {
        $statistic = [
            'user' => $this->userRepositoryRepository->countRecord([]),
            'lesson' => $this->lessonRepositoryRepository->countRecord([]),
            'word' => $this->wordRepositoryRepository->countRecord([]),
            'category' => $this->categoryRepositoryRepository->countRecord([])
        ];

        return $this->_renderView('index', compact('statistic'));
    }
}
