<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use  App\CommonLocale;
use Illuminate\Support\Facades\Log;

class Common extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;

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
    protected $fillable = [];

    /**
     * allowed filter field
     *
     * @var array
     */
    protected $filterFields = [];


    /**
     * allowed update field
     *
     * @var array
     */
    protected $updateFields = [];


    /**
     * @var array
     */
    protected $multiLanguages = array();

    /**
     * foreign key of table locale relate
     *
     * @var string
     */
    protected $foreignKeyInLocale = '';

    /**
     * build query
     * @param array $fields
     * @param array $filter
     * @param string $orderBy
     * @return mixed
     */
    protected function _queryBuild($fields = ['*'], $filter = [], $orderBy = 'id')
    {
        $query = $this::select($fields);

        foreach ($this->filterFields as $field) {
            if (isset($filter[$field])) {
                $query = $query->where($field, $filter[$field]);

            }
        }

        $query = $query->orderBy($orderBy);

        return $query;
    }

    /**
     * get list id of table
     * @param array $filter
     * @return array
     */
    protected function _getListId($filter = [])
    {
        $query = $this->_queryBuild(['*'], $filter);

        return $query->lists('id');
    }

    /**
     *
     * @param \App\CommonLocale $commonLocale
     * @param array $filter
     * @return array
     */
    protected function _getLocales(CommonLocale $commonLocale, $filter = [])
    {
        $listIds = $this->_getListId(['*'], $filter);

        $arrLocale = $commonLocale->getLocalesResponseArray($listIds, $this->foreignKeyInLocale);

        return $arrLocale;
    }

    /**
     *
     * @param $arrLocale
     * @param $data
     * @return mixed
     */
    protected function _mergeLocaleToData($arrLocale, $data)
    {
        if(count($data)) {

            foreach ($data as $item) {

                $item->locale = isset($arrLocale[$item->id]) ? $arrLocale[$item->id] : null;
            }
        }

        return $data;
    }

    /**
     * generate raw data for locale table
     * @param $rawData : input data
     * @return array
     */
    protected function _generateRawDataForLocale($rawData)
    {
        $rawLocale = [];

        foreach ($this->multiLanguages as $field) {
            $rawLocale[$field] = $rawData[$field];

        }

        return $rawLocale;
    }

    /**
     * @param \App\CommonLocale $commonLocale
     * @param $rawLocaleData :
     * @param $conditionId : id of root table
     * @return static
     */
    protected function _createOrUpdateLocale(CommonLocale $commonLocale, $rawLocaleData, $conditionId)
    {
        return $commonLocale->createOrUpdateLocale($conditionId, $this->foreignKeyInLocale, $rawLocaleData);
    }

    /**
     * @param \App\CommonLocale $commonLocale
     * @param $conditionId : id of root table
     * @return mixed
     * @throws \Exception
     */
    protected function _deletedLocale(CommonLocale $commonLocale, $conditionId)
    {
        return $commonLocale->deleteWithConditionId($conditionId, $this->foreignKeyInLocale);
    }

    /**
     * get list items of table
     * @param array $filter : condition of query
     * @param array $fields : the need to get columns
     * @return mixed
     */
    public function getAll($fields = ['*'], $filter = [])
    {
        $query = $this->_queryBuild($fields, $filter);

        $items = $query->get();

        //TODO : In the classes extend, we can continue process data (if it is necessary)
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
        $query = $this->_queryBuild($fields, $filter);

        $items = $query->paginate($perPage);

        //TODO : In the classes extend, we can continue process data (if it is necessary). Maybe is multiple language
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
        $item = $this::find($id);

        //TODO : In the classes extend  , we can continue process data (if it is necessary). Maybe is multiple language
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
        try {
            $object = $this::create($rawData);

            //TODO : In the classes extend, we can continue process data (if it is necessary)
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
        try {
            $object = $this::findOrFail($id);

            foreach ($this->updateFields as $field) {
                if (isset($input[$field])) {
                    $object->{$field} = $rawData[$field];

                }
            }

            $object->save();

            //TODO : In the classes extend, we can continue process data (if it is necessary)
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
            $object = $this::findOrFail($id);
            $object->delete();

            //TODO : In the classes extend, we can continue process data (if it is necessary) and use soft delete
            return $object;

        } catch ( \Exception $e) {
            throw $e;

        }
    }



}
