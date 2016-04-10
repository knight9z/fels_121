<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getAllWithPage ($filter, $field = ['*'] ,$perPage);
    public function getDetail ($id);
    public function updateItem ($id, $rawData);
    public function createItem ($rawData);
    public function deleteItem ($id);
    public function isAdmin();
    public function isUser();
    public function countRecord($filter = []);
}