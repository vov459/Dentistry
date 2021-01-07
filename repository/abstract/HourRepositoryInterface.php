<?php

namespace Repository\abstract;
use Model\Doctor;


interface HourReceptionRepositoryInterface
{
    public function findAll() : array;

    public function findById(int $id) : Doctor;

    public function create(Doctor $doctor) : bool;

    public function update(Doctor $doctor) : bool;

    public function delete(int $id) : bool;

}