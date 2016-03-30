<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonLocale extends CommonLocale
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lesson_locales';

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
    protected $fillable = ['title', 'language_id', 'lesson_id'];


    /**
     * allowed update field
     *
     * @var array
     */
    protected $updateFields = ['title'];
}
