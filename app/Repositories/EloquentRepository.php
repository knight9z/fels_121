<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class EloquentRepository
{
     protected $model;

     /**
      * upload image
      * @param string $preFix
      * @param string $field
      * @return array
      */
     protected function _uploadImage($preFix = 'cat', $field = 'image' )
     {
         if(!empty(Input::file($field))){
             $path = public_path('uploads/');
             $imageData = Input::file($field);
             $imageName = $preFix . "_" . time() . "." . $imageData->getClientOriginalExtension();
             $image = $imageData->move($path, $imageName);

             if (empty($image)) {
                 return ['error' => true, 'message' => trans('file.uploads.move_fail')];

             }

             return ['error' => false, 'data' => $imageName];
         }

         return ['error' => true, 'message' => trans('file.uploads.file_empty')];
     }

    /**
     * @param $filter
     * @param array $fields
     * @return mixed
     */
    public function getList($filter, $fields = ['*'] )
    {
        return $this->model->getList ($filter, $fields);
    }

    /**
     * @param $filter
     * @param array $fields
     * @param $perPage
     * @return mixed
     */
    public function getAllWithPage($filter, $fields = ['*'], $perPage = 15)
    {
        return $this->model->getAllWithPage ($filter, $fields, $perPage);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDetail($id)
    {
        return $this->model->getDetail ($id);
    }

    /**
     * @param $id
     * @param $rawData
     * @return mixed
     * @throws \Exception
     */
    public function updateItem($id, $rawData)
    {
        try {
            //start transaction
            DB::beginTransaction();
            // Passing all input from the request to create a new Object
            $object = $this->model->updateItem($id, $rawData);
            // commit transaction
            DB::commit();

            return $object;

        } catch (\Exception $e){
            DB::rollBack();
            throw $e;
            //TODO : we wil process in handle exception.
        }
    }

    /**
     * @param $rawData
     * @return mixed
     * @throws \Exception
     */
    public function createItem($rawData)
    {
        try {
            //start transaction
            DB::beginTransaction();
            // Passing all input from the request to create a new Object
            $object = $this->model->createItem($rawData);
            // commit transaction
            DB::commit();

            return $object;

        } catch (\Exception $e){
            DB::rollBack();
            throw $e;
            //TODO : we wil process in handle exception.
        }
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function deleteItem($id)
    {
        try {
            //start transaction
            DB::beginTransaction();
            // Passing all input from the request to create a new Object
            $object = $this->model->deleteItem($id);
            // commit transaction
            DB::commit();

            return $object;

        } catch (\Exception $e){
            DB::rollBack();
            throw $e;
            //TODO : we wil process in handle exception.
        }
    }

}