<?php

namespace App;

class Category extends Common
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Don't forget to fill this array
     *
     * @var array
     */
    protected $fillable = ['image'];

    /**
     * @var array
     */
    protected $multiLanguages = ['title', 'summary'];

    /**
     * foreign key of table locale relate
     *
     * @var string
     */
    protected $foreignKeyInLocale = 'category_id';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['locale'];

    /**
     * @var array
     */
    protected $updateFields = ['image'];

    public function getLocaleAttribute()
    {
        $locales = [
            'id' => 0,
            'title' => 'No data in this language',
            'summary' => 'No data in this language',
        ];

        $categoryLocale = new CategoryLocale();
        $data = $categoryLocale->getLocale($this->id, $this->foreignKeyInLocale);
        if ($data) {
            $locales['title'] = $data->title;
            $locales['summary'] = $data->summary;
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
            $categoryLocale = new CategoryLocale();

            $object->locale = $this->_createOrUpdateLocale($categoryLocale, $rawDataLocale, $object->id);

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
            $categoryLocale = new CategoryLocale();

            $object->locale = $this->_createOrUpdateLocale($categoryLocale, $rawDataLocale, $id);

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
        //extend function
        $object = parent::deleteItem($id);

        try {
            //update arrLocale
            $categoryLocale = new CategoryLocale();
            $object->locale = $this->_deletedLocale($categoryLocale, $id);

            return $object;
        } catch ( \Exception $e) {
            throw $e;

        }
    }

}
