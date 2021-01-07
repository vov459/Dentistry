<?php

namespace Repository\abstract;
use Model\PatientReception;


interface PatientReceptionRepositoryInterface
{
    public function findAll() : array;

    public function findById(int $id) : PatientReception;

    public function create(PatientReception $patientReception) : bool;

    public function update(PatientReception $patientReception) : bool;

    public function delete(int $id) : bool;

}