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
    protected $multiLanguages = ['title', 'summary'];

    /**
     * @var array
     */
    protected $updateFields = ['lesson_id', 'word_id'];
}
