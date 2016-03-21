<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: FRAMGIA\nguyen.viet.anhb
 * Date: 18/03/2016
 * Time: 13:59
 */
abstract class AbstractEloquentRepository {

    protected $model;

    /**
     * @param $filter
     * @param array $fields
     * @return mixed
     */
    public function getList ($filter, $fields = ['*'] )
    {
        return $this->model->getList ($filter, $fields);
    }

    /**
     * @param $filter
     * @param array $fields
     * @param $perPage
     * @return mixed
     */
    public function getAllWithPage ($filter, $fields = ['*'], $perPage = 15)
    {
        return $this->model->getAllWithPage ($filter, $fields, $perPage);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDetail ($id)
    {
        return $this->model->getDetail ($id);
    }

    /**
     * @param $id
     * @param $rawData
     * @return mixed
     * @throws \Exception
     */
    public function updateItem ($id, $rawData)
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
    public function createItem ($rawData)
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
     * @throws Exception
     */
    public function deleteItem ($id)
    {
        try {
            //start transaction
            DB::beginTransaction();

            // Passing all input from the request to create a new Object
            $object = $this->model->destroy($id);

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