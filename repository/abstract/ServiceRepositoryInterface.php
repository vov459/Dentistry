<?php

namespace Repository\abstract;
use Model\Service;


interface ServiceRepositoryInterface
{
    public function findAll() : array;

    public function findById(int $id) : Service;

    public function create(Service $service) : bool;

    public function update(Service $service) : bool;

    public function delete(int $id) : bool;



}
