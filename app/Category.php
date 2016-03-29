<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
     * get list items of table
     * @param array $filter : condition of query
     * @param array $fields : the need to get columns
     * @return mixed
     */
    public function getAll($fields = ['*'], $filter = [])
    {
        //extend function
        $items = parent::getAll($fields, $filter);

        //get arrLocale
        $categoryLocale = new CategoryLocale();
        $arrLocale = $this->_getLocales($categoryLocale, $filter);

        //merge locale to response data
        $items = $this->_mergeLocaleToData($arrLocale, $items);

        return $items;
    }


    /**
     * get list items of table and paging
     * @param array $filter : condition of query
     * @param array $fields : the need to get columns
     * @return mixed
     */
    public function getAllWithPage($filter = [], $fields = ['*'], $perPage = 15)
    {
        //extend function
        $items = parent::getAllWithPage($filter, $fields, $perPage);

        //get arrLocale
        $categoryLocale = new CategoryLocale();
        $arrLocale = $this->_getLocales($categoryLocale,  $filter);

        //merge locale to response data
        $items['data'] = $this->_mergeLocaleToData($arrLocale, $items['data']);

        return $items;
    }

    /**
     * get detail a record
     *
     * @param $id : id of table
     * @return mixed
     */
    public function getDetail($id)
    {
        //extend function
        $item = parent::getDetail($id);

        //get arrLocale
        $categoryLocale = new CategoryLocale();
        $item->locale = $categoryLocale->getLocale($id, $this->foreignKeyInLocale);

        return $item;
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
        //extend function
        $object = parent::updateItem($id, $rawData);

        //generate data value
        $rawDataLocale = $this->_generateRawDataForLocale($rawData);

        try {
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
