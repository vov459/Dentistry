<?php

namespace Repository\abstract;
use Model\Appeal;


interface AppealRepositoryInterface
{
    public function findAll() : array;

    public function findById(int $id) : Appeal;

    public function create(Appeal $appeal) : bool;

    public function update(Appeal $appeal) : bool;

    public function delete(int $id) : bool;

}