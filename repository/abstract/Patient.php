<?php

namespace Repository\abstract;
use Model\Patient;


interface PatientRepositoryInterface
{
    public function findAll() : array;

    public function findById(int $id) : Patient;

    public function create(Patient $patient) : bool;

    public function update(Patient $patient) : bool;

    public function delete(int $id) : bool;

}
