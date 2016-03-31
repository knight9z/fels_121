<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class WordAnswer extends Common
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'word_answers';

    /**
     * Don't forget to fill this array
     *
     * @var array
     */
    protected $fillable = ['word_id'];

    /**
     * @var array
     */
    protected $multiLanguages = ['content_answer', 'note_answer'];

    /**
     * foreign key of table locale relate
     *
     * @var string
     */
    protected $foreignKeyInLocale = 'word_answer_id';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['locale'];

    /**
     * @var array
     */
    protected $updateFields = [];

    /**
     * get answer
     *
     * @return array
     */
    public function getLocaleAttribute()
    {
        $locales = [
            'id' => 0,
            'content_answer' => 'No data in this language',
            'note_answer' => 'No data in this language',
        ];

        $wordAnswerLocale = new WordAnswerLocale();
        $data = $wordAnswerLocale->getLocale($this->id, $this->foreignKeyInLocale);
        if ($data) {
            $locales['content_answer'] = $data->content_answer;
            $locales['note_answer'] = $data->note_answer;
            $locales['id'] = $data->id;
        }

        return $locales;
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
        //extend function
        $object = parent::createItem($rawData);

        //generate data value
        $rawDataLocale = $this->_generateRawDataForLocale($rawData);

        try {
            //create arrLocale
            $wordAnswerLocales = new WordAnswerLocale();

            $object->locale = $this->_createOrUpdateLocale($wordAnswerLocales, $rawDataLocale, $object->id);

            return $object;

        } catch ( \Exception $e) {
            throw $e;

        }
    }

    public function updateItem($wordId, $rawData)
    {
        try {
            $object = $this::where('word_id', $wordId)
                        ->firstOrFail();

            //generate data value
            $rawDataLocale = $this->_generateRawDataForLocale($rawData);

            //update arrLocale
            $wordAnswerLocale = new WordAnswerLocale();

            $object->locale = $this->_createOrUpdateLocale($wordAnswerLocale, $rawDataLocale, $object->id);


            //TODO : In the classes extend, we can continue process data (if it is necessary)
            return $object;

        } catch ( \Exception $e) {
            throw $e;

        }
    }
}
