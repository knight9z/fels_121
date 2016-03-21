<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Common
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';

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
    protected $fillable = ['iso_code'];

    /**
     * allowed filter field
     *
     * @var array
     */
    protected $filterFields = ['id', 'iso_code'];


    /**
     * allowed update field
     *
     * @var array
     */
    protected $updateFields = [];


}
