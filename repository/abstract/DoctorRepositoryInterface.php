<?php

namespace Repository\abstract;
use Model\Doctor;


interface DoctorRepositoryInterface
{
    public function findAll() : array;

    public function findById(int $id) : Doctor;

    public function create(Doctor $doctor) : bool;

    public function update(Doctor $doctor) : bool;

    public function delete(int $id) : bool;

}