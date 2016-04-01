<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Word extends Common
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'words';

    /**
     * Don't forget to fill this array
     *
     * @var array
     */
    protected $fillable = ['category_id', 'content'];


    /**
     * @var array
     */
    protected $updateFields = ['category_id', 'content'];

    /**
     * allowed filter field
     *
     * @var array
     */
    protected $filterFields = ['category_id', 'content'];

    /**
     * relation with table answer
     */
    public function answer()
    {
        return $this->hasOne(WordAnswer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * get all record and padding
     *
     * @param array $filter
     * @param array $fields
     * @param int $perPage
     * @return mixed
     */
    public function getAllWithPage($filter = [], $fields = ['*'], $perPage = 15)
    {
        $words = parent::getAllWithPage($filter, $fields, $perPage);
        foreach ($words as &$word){
            $word->answer;
            $word->category;
            $word->count_lesson = $this->lessons()->count();
        }

        return $words;
    }

    /**
     * add an item
     *
     * @param $rawData
     * @return mixed
     * @throws \Exception
     */
    public function createItem($rawData)
    {
        try {
            //extend function
            $object = parent::createItem($rawData);
            $rawData['word_id'] = $object->id;

            //create answer
            $wordAnswer = new WordAnswer();
            $object->answer = $wordAnswer->createItem($rawData);

            return $object;

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
    public function updateItem($id, $rawData)
    {
        try {
            //extend function
            $object = parent::updateItem($id, $rawData);
            //create answer
            $wordAnswer = new WordAnswer();
            $object->answer = $wordAnswer->updateItem($id, $rawData);

            return $object;

        } catch ( \Exception $e) {
            throw $e;

        }
    }

    /**
     * get detail record
     * @param $id
     * @return mixed
     */
    public function getDetail($id)
    {
        $word = parent::getDetail($id);
        $word->category;
        $word->answer;
        return $word;

    }


    /**
     * remove an item
     *
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function deleteItem($id)
    {

        try {
            $object = parent::deleteItem($id);
            //remove word answer
            $wordAnswer = WordAnswer::where('word_id', $id)->firstOrFail();
            //remove word answer
            $answerLocale = WordAnswerLocale::where('word_answer_id', $wordAnswer->id)->delete();

            return $object;

        } catch ( \Exception $e) {
            throw $e;

        }
    }

    public function searchByCategory($categoryId, $wordKeySearch)
    {
        $fields = ['id', 'content as name'];
        $filter = ['category_id' => $categoryId ];
        $likeFilter = ['content' => '%'. $wordKeySearch . '%'];
        $query = $this->_queryBuild($fields, $filter, $likeFilter);

        return $query->get();
    }
}


