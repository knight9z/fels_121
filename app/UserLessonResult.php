<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class UserLessonResult extends Common
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_lesson_result';

    /**
     * Don't forget to fill this array
     *
     * @var array
     */
    protected $fillable = [
        'user_lesson_id','word_id','word_answer_id','word_answer_correct_id',
        'word_answer_wrong_id_1','word_answer_wrong_id_2','word_answer_wrong_id_3',
        'is_correct',
    ];

    /**
     * @var array
     */
    protected $updateFields = [
        'user_lesson_id','word_id','word_answer_id','word_answer_correct_id',
        'word_answer_wrong_id_1','word_answer_wrong_id_2','word_answer_wrong_id_3',
        'is_correct',
    ];

    /**
     * allowed filter field
     *
     * @var array
     */
    protected $filterFields = [
        'user_lesson_id','word_id','word_answer_id','word_answer_correct_id',
        'word_answer_wrong_id_1','word_answer_wrong_id_2','word_answer_wrong_id_3',
        'is_correct',
    ];

    public function wrongAnswer1()
    {
        return $this->hasOne(WordAnswerLocale::class, 'word_answer_id', 'word_answer_wrong_id_1');
    }

    public function wrongAnswer2()
    {
        return $this->hasOne(WordAnswerLocale::class, 'word_answer_id', 'word_answer_wrong_id_2');
    }

    public function wrongAnswer3()
    {
        return $this->hasOne(WordAnswerLocale::class, 'word_answer_id', 'word_answer_wrong_id_3');
    }

    public function answerMember()
    {
        return $this->hasOne(WordAnswerLocale::class, 'word_answer_id', 'word_answer_id');
    }

    public function correctAnswer()
    {
        return $this->hasOne(WordAnswerLocale::class, 'word_answer_id', 'word_answer_correct_id');
    }

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function updateItem($userLessonId, $rawData)
    {
        try {
            $response = [];
            $totalCorrect = 0;
            foreach ($rawData as $userLessonResult ) {
                $object = $this::where('id', $userLessonResult['id'])->firstOrFail();
                $object->word_answer_id = $userLessonResult['word_answer_id'];

                if ($object->word_answer_id == $object->word_answer_correct_id) {
                    $object->is_correct = 1 ;
                    $totalCorrect++;
                }

                $object->save();
                $response[] = $object;
            }
            $response['totalCorrect'] = $totalCorrect;
            return $response;

        } catch ( \Exception $e) {
            throw $e;
        }
    }

    /**
     * add an item
     *
     * @param $rawData
     * @return mixed
     * @throws \Exception
     */
    public function createItem($rawDatas)
    {
        try {
            $object = [];
            foreach ($rawDatas['user_lesson_result'] as $rawData) {
                $rawData['user_lesson_id'] = $rawDatas['user_lesson_id'];
                $object[] = $this::create($rawData);
            }

            //TODO : In the classes extend, we can continue process data (if it is necessary)
            return $object;

        } catch ( \Exception $e) {
            throw $e;

        }
    }


}
