<?php
namespace App\Repositories\Category;

interface CategoryRepositoryInterface {
    public function getAllWithPage($filter, $perPage);
    public function getDetail($id);
    public function updateItem($id, $rawData);
    public function createItem($rawData);
    public function deleteItem($id);
    public function getList($filter, $fields);
    public function countRecord($filter = []);
}