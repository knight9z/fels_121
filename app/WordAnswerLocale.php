<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WordAnswerLocale extends CommonLocale
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'word_answer_locales';

    /**
     * time stamp
     *
     * @var bool
     */
    public $timestamps = true;


    /**
     * Don't forget to fill this array
     *
     * @var array
     */
    protected $fillable = ['content_answer', 'note_answer', 'language_id', 'word_answer_id'];


    /**
     * allowed update field
     *
     * @var array
     */
    protected $updateFields = ['content_answer', 'note_answer'];
}
