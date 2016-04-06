<?php

namespace App\Repositories\Relationship;

interface RelationshipRepositoryInterface
{
    public function getListUser($filter);
    public function createItem ($rawData);
    public function deleteItem ($id);
}