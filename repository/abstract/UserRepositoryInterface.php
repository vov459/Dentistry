<?php

namespace Repository\abstract;
use Model\User;


interface UserRepositoryInterface
{
    public function findAll() : array;

    public function findById(int $id) : User;

    public function create(User $user) : bool;

    public function update(User $user) : bool;

    public function delete(int $id) : bool;

}
