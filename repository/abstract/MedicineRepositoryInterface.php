<?php

namespace Repository\abstract;
use Model\Medicine;


interface MedicineRepositoryInterface
{
    public function findAll() : array;

    public function findById(int $id) : Medicine;

    public function create(Medicine $medicine) : bool;

    public function update(Medicine $medicine) : bool;

    public function delete(int $id) : bool;

}
