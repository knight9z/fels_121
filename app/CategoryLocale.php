<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryLocale extends CommonLocale
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category_locales';

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
    protected $fillable = ['title', 'summary', 'language_id', 'category_id'];


    /**
     * allowed update field
     *
     * @var array
     */
    protected $updateFields = ['title', 'summary'];


}
