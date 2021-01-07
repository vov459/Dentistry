<?php

namespace Repository\abstract;
use Model\HourReception;


interface HourReceptionRepositoryInterface
{
    public function findAll() : array;

    public function findById(int $id) : HourReception;

    public function create(HourReception $hourReception) : bool;

    public function update(HourReception $hourReception) : bool;

    public function delete(int $id) : bool;

}