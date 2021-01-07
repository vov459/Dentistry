<?php

namespace Repository\abstract;
use Model\Sale;


interface SaleRepositoryInterface
{
    public function findAll() : array;

    public function findById(int $id) : Sale;

    public function create(Sale $doctor) : bool;

    public function update(Sale $doctor) : bool;

    public function delete(int $id) : bool;

}