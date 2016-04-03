<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonWord extends Common
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lesson_word';

    /**
     * Don't forget to fill this array
     *
     * @var array
     */
    protected $fillable = ['lesson_id', 'word_id'];

    /**
     * @var array
     */
    protected $updateFields = ['lesson_id', 'word_id'];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function words()
    {
        return $this->belongsTo(Word::class, 'word_id', 'id');
    }

    public function getAllWithPage($filter = [], $fields = ['*'], $perPage = 15)
    {
        $data = parent::getAllWithPage($filter, $fields, $perPage);
        foreach ($data as $item) {
            $item->words;
        }

        return $data;
    }

    public function createItem($rawDatas)
    {
        $response = [];
        foreach ($rawDatas as $rawData)
        {
            $response[] = LessonWord::updateOrCreate($rawData, $rawData);
        }
        return $response;
    }
}
