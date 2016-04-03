<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Common
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lessons';

    /**
     * Don't forget to fill this array
     *
     * @var array
     */
    protected $fillable = ['category_id'];

    /**
     * @var array
     */
    protected $multiLanguages = ['title'];

    /**
     * foreign key of table locale relate
     *
     * @var string
     */
    protected $foreignKeyInLocale = 'lesson_id';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['locale'];

    /**
     * @var array
     */
    protected $updateFields = ['category_id'];

    public function words()
    {
        return $this->hasMany(LessonWord::class);
    }
    /**
     * get title locale
     *
     * @return array
     */
    public function getLocaleAttribute()
    {
        $locales = [
            'id' => 0,
            'title' => 'No data in this language',
        ];

        $lessonLocale = new LessonLocale();
        $data = $lessonLocale->getLocale($this->id, $this->foreignKeyInLocale);
        if ($data) {
            $locales['title'] = $data->title;
            $locales['summary'] = $data->summary;
            $locales['id'] = $data->id;
        }

        return $locales;
    }

    /**
     * belong to with category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
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
        $lessons = parent::getAllWithPage($filter, $fields, $perPage);
        foreach ($lessons as $lesson){
            $lesson->category;
            $lesson->count_words = $lesson->words->count();
        }

        return $lessons;
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
            $lessonLocale = new LessonLocale();

            $object->locale = $this->_createOrUpdateLocale($lessonLocale, $rawDataLocale, $object->id);

            return $object;

        } catch ( \Exception $e) {
            throw $e;

        }
    }

    /**
     * update an item
     *
     * @param $id
     * @param $rawData
     * @return mixed
     * @throws \Exception
     */
    public function updateItem($id, $rawData)
    {
        //generate data value
        $rawDataLocale = $this->_generateRawDataForLocale($rawData);

        try {
            //extend function
            $object = parent::updateItem($id, $rawData);

            //update arrLocale
            $lessonLocale = new LessonLocale();

            $object->locale = $this->_createOrUpdateLocale($lessonLocale, $rawDataLocale, $id);

            return $object;
        } catch ( \Exception $e) {
            throw $e;

        }
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
            //extend function
            $object = parent::deleteItem($id);

            //update arrLocale
            LessonLocale::where('lesson_id', $id)->delete();

            return $object;
        } catch ( \Exception $e) {
            throw $e;

        }
    }
}
