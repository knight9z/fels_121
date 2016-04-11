<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonWordCreateRequest;
use App\Repositories\Lesson\LessonRepositoryInterface;
use App\Repositories\LessonWord\LessonWordRepositoryInterface;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class LessonWordsController extends CommonsController
{
    protected $lessonWordRepository;
    protected $lessonRepository;

    public function __construct(LessonWordRepositoryInterface $lessonWordRepository, LessonRepositoryInterface $lessonRepository)
    {
        parent::__construct();
        $this->lessonWordRepository = $lessonWordRepository;
        $this->lessonRepository = $lessonRepository;
        $this->viewFolder = 'backend.lesson_word';
    }

    public function index($lessonId)
    {
        $filter = ['lesson_id' => $lessonId];
        $words = $this->lessonWordRepository->getAllWithPage($filter);
        $lesson = $this->lessonRepository->getDetail($lessonId);

        return $this->_renderView('index', compact('words', 'lesson'));
    }

    public function create($lessonId)
    {
        return $this->_renderView('create', compact('lessonId'));
    }


    public function store(LessonWordCreateRequest $request, $lessonId)
    {
        $rawData = [];
        $wordIdInput = $request->only('word_id');
        $listWordId = explode(',', $wordIdInput['word_id']);

        foreach ($listWordId as $wordId) {
            $rawData[] = ['lesson_id' => $lessonId, 'word_id' => $wordId ];
        }

        $responseFromRepository = $this->lessonWordRepository->createItem($rawData);

        if (isset($responseFromRepository['error']) && $responseFromRepository['error']) {
            return $this->_redirectPage('/admin/lesson/' . $lessonId . '/detail/create', $rawData, [$responseFromRepository['message']]);

        } else {
            Session::flash('success', trans('backend/layout.message_success'));
            return $this->_redirectPage('/admin/lesson/' . $lessonId . '/detail');

        }
    }

    public function deleteWord($lessonWordId, $lessonId)
    {
        $this->lessonWordRepository->deleteItem($lessonWordId);
        Session::flash('success', trans('backend/layout.message_success'));

        return $this->_redirectPage('/admin/lesson/detail/list/' . $lessonId);
    }
}
