<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonWordCreateRequest;
use App\Repositories\LessonWord\LessonWordRepositoryInterface;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class LessonWordsController extends CommonsController
{
    protected $lessonWordRepository;

    public function __construct(LessonWordRepositoryInterface $lessonWordRepository)
    {
        parent::__construct();
        $this->lessonWordRepository = $lessonWordRepository;
        $this->viewFolder = 'backend.lesson_word';
    }

    public function getList($lessonId)
    {
        $filter = [
            'lesson_id' => $lessonId
        ];
        $words = $this->lessonWordRepository->getAllWithPage($filter);

        echo json_encode($words);die;
        return $this->_renderView('index', compact('words'));
    }

    public function getAdd($lessonId)
    {
        return $this->_renderView('create', compact('lessonId'));
    }


    public function postAdd(LessonWordCreateRequest $request, $lessonId)
    {
        $rawData = [];
        $wordIdInput = $request->only('word_id');
        $listWordId = explode(',', $wordIdInput['word_id']);

        foreach($listWordId as $wordId){
            $rawData[] = ['lesson_id' => $lessonId, 'word_id' => $wordId ];
        }

        $responseFromRepository = $this->lessonWordRepository->createItem($rawData);

        if(isset($responseFromRepository['error']) && $responseFromRepository['error']){
            return $this->_redirectPage('/admin/lesson/word/add/'. $lessonId, $rawData, [$responseFromRepository['message']]);

        } else {
            Session::flash('success', trans('backend/layout.message_success'));
            return $this->_redirectPage('/admin/lesson/word/list/'. $lessonId);

        }
    }
}
