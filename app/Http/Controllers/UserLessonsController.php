<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLessonCreateRequest;
use App\Http\Requests;
use App\Repositories\Lesson\LessonRepositoryInterface;
use App\Repositories\UserLesson\UserLessonRepositoryInterface;
use App\Repositories\WordAnswer\WordAnswerRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserLessonsController extends CommonsController
{
    protected $userLessonRepository;
    protected $wordAnswerRepository;
    protected $lessonRepository;

    public function __construct(WordAnswerRepositoryInterface $wordAnswerRepository,
        UserLessonRepositoryInterface $userLessonRepository,
        LessonRepositoryInterface $lessonRepository)
    {
        parent::__construct();
        $this->userLessonRepository = $userLessonRepository;
        $this->wordAnswerRepository = $wordAnswerRepository;
        $this->lessonRepository = $lessonRepository;
        $this->viewFolder = 'frontend.lesson';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserLessonCreateRequest $request)
    {
        $rawData = $request->only(['lesson_id', 'user_id']);
        $currentLesson = $this->lessonRepository->getDetail($rawData['lesson_id']);
        $user_lesson_result = [];


        foreach ($currentLesson->words as $lessonWord) {
            $result = $this->wordAnswerRepository->getRandomWordAnswer($lessonWord->words->answer->id);
            $result['word_id'] = $lessonWord->word_id;
            $result['word_answer_correct_id'] = $lessonWord->words->answer->id;
            $user_lesson_result[] = $result;
        }

        $rawData['user_lesson_result'] = $user_lesson_result;

        $responseFromRepository = $this->userLessonRepository->createItem($rawData);

        if($responseFromRepository['error']){
            return back()->withErrors[$responseFromRepository['message']];

        } else {
            return $this->_redirectPage('/client/start/lesson/'. $responseFromRepository['data']->id .'/edit');

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
        $currentUser = Auth::user();
        $userLesson = $this->userLessonRepository->getDetail($id);
       // echo json_encode($userLesson->result[0]->answerMember);die;
        return $this->_renderView('result', compact('currentUser', 'userLesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentUser = Auth::user();
        $userLesson = $this->userLessonRepository->getDetail($id);
        return $this->_renderView('start', compact('currentUser', 'userLesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserLessonCreateRequest $request, $id)
    {
        $rawData = $request->all();
        $result = [];

        foreach ($rawData['result'] as $userLessonResultId => $wordAnswerId ) {
            $result[] = [
                'id' => $userLessonResultId,
                'word_answer_id' => $wordAnswerId,
            ];
        }

        $rawData['user_lesson_result'] = $result;

        $responseFromRepository = $this->userLessonRepository->updateItem($id, $rawData);

        if ($responseFromRepository['error']){
            return back()->withErrors[$responseFromRepository['message']];

        } else {
            return $this->_redirectPage('/client/start/lesson/'. $responseFromRepository['data']->id);

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
        //
    }
}
