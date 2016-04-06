<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class CommonLocale extends Model
{
    use SoftDeletes;

    /**
     * @var code language
     */
    protected $isoCode;

    /**
     * @var id of language in table languages
     */
    protected $langId;

    /**
     * Don't forget to fill this array
     */
    protected $fillable = ['language_id'];

    /**
     * allowed update field
     *
     * @var array
     */
    protected $updateFields = [];

    /**
     * CommonLocale constructor.
     */
    public function __construct()
    {
        $this->isoCode = App::getLocale();
        $langObject = Language::where('iso_code', $this->isoCode)
                        ->first();
        $this->langId = $langObject->id;
    }

    /**
     * build query
     *
     * @param $conditionListId : array value of $conditionField
     * @param $conditionField : foreign key of table (Example : category_id, word_answer_id , ...)
     * @return mixed
     */
    protected function _queryBuild($conditionListId, $conditionField)
    {
        $query = $this::where('language_id', $this->langId)
                    ->whereIn($conditionField, $conditionListId);
        return $query;
    }

    /**
     * update or create one record
     * @param $conditionId : value of $conditionField
     * @param $conditionField : foreign key of table (Example : category_id, word_answer_id , ...)
     * @param $rawData
     * @return static
     */
    public function createOrUpdateLocale($conditionId, $conditionField, $rawData)
    {
        //get locale
        $query = $this->_queryBuild([$conditionId], $conditionField);
        $object = $query->first();

        if ($object) {
            //action update
            foreach ($this->updateFields as $field) {
                if (isset($rawData[$field])) {
                    $object->{$field} = $rawData[$field];
                }
            }
            $objectResponse = $object->save();

        } else {
            // action create
            $rawData['language_id'] = $this->langId;
            $rawData[$conditionField] = $conditionId;
            $objectResponse = $this->addDataLocale($rawData);
        }

        return $objectResponse;
    }

    /**
     * get detail on record
     *
     * @param $conditionId : value of $conditionField
     * @param $conditionField : foreign key of table (Example : category_id, word_answer_id , ...)
     * @return mixed
     */
    public function getLocale($conditionId, $conditionField)
    {
        $query = $this->_queryBuild([$conditionId], $conditionField);
        return $query->first();
    }

    /**
     * get list locale
     *
     * @param $conditionListId : array value of $conditionField
     * @param $conditionField : foreign key of table (Example : category_id, word_answer_id , ...)
     * @return mixed
     */
    public function getLocales($conditionListId = [], $conditionField)
    {
        $query = $this->_queryBuild($conditionListId, $conditionField);
        return $query->get();
    }

    /**
     * get list locale and save to array with key is condition id
     *
     * @param $conditionListId : array value of $conditionField
     * @param $conditionField : foreign key of table (Example : category_id, word_answer_id , ...)
     * @return array
     */
    public function getLocalesResponseArray($conditionListId = [], $conditionField)
    {
        $responseData = [];
        $objectData = $this->getLocales($conditionListId, $conditionField);

        foreach ($objectData as $object) {
            $responseData[$object->$conditionField] = $object;
        }

        return $responseData;
    }


    /**
     *
     * @param $conditionListId : array value of $conditionField
     * @param $conditionField : foreign key of table (Example : category_id, word_answer_id , ...)
     * @return mixed
     * @throws \Exception
     */
    public function deleteWithConditionId($conditionListId, $conditionField)
    {
        try {
            //delete all language of item
            $object = $this::where($conditionField, $conditionListId)
                        ->delete();

            return $object;

        } catch ( \Exception $e) {
            throw $e;

        }
    }

    /**
     * @param $rawData
     * @return $this
     */
    public function addDataLocale($rawData)
    {
        foreach ($rawData as $key => $value)
        {
            $this->{$key} = $value;
        }
        $this->save();

        return $this;
    }
}
