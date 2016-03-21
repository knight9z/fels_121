<?php

/**
 * Created by PhpStorm.
 * User: FRAMGIA\nguyen.viet.anhb
 * Date: 18/03/2016
 * Time: 15:30
 */

namespace App\Repositories\Category;

interface CategoryRepoInterface {

    public function getAllWithPage ($filter, $perPage);
    public function getDetail ($id);
    public function updateItem ($id, $rawData);
    public function createItem ($rawData);
    public function deleteItem ($id);

}