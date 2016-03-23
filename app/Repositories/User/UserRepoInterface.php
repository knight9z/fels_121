<?php

/**
 * Created by PhpStorm.
 * User: FRAMGIA\nguyen.viet.anhb
 * Date: 22/03/2016
 * Time: 14:01
 */
namespace App\Repositories\User;

interface UserRepoInterface
{
    public function getAllWithPage ($filter, $perPage);
    public function getDetail ($id);
    public function updateItem ($id, $rawData);
    public function createItem ($rawData);
    public function deleteItem ($id);

}