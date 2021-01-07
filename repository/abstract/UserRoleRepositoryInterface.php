<?php

namespace Repository\abstract;
use Model\UserRole;


interface UserRoleRepositoryInterface
{
    public function findAll() : array;

    public function findById(int $id) : UserRole;

    public function create(UserRole $userRole) : bool;

    public function update(UserRole $userRole) : bool;

    public function delete(int $id) : bool;

}