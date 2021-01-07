<?php

namespace Repository\abstract;
use Model\Registrar;


interface RegistrarRepositoryInterface
{
    public function findAll() : array;

    public function findById(int $id) : Registrar;

    public function create(Registrar $registrar) : bool;

    public function update(Registrar $registrar) : bool;

    public function delete(int $id) : bool;

}