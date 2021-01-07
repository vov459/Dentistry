<?php
namespace Repository;
use Model\UserRole;

use Repository\abstract\UserRoleRepositoryInterface;

class UserRoleRepository implements UserRoleRepositoryInterface
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function findAll() : array
    {
        $arr = array();
        $res = $this->db->readQuery("SELECT * FROM user_role");
        foreach ($res as $row) {
            array_push($arr,UserRole::fromAssocArray($row));
        }
        return $arr;
    }

    public function findById($id) : UserRole
    {
        return UserRole::fromAssocArray($this->db->readQuery("SELECT * FROM user_role WHERE id=?","i",$id)[0]);
    }

    public function create(UserRole $obj) : bool
    {
        return $this->db->writeQuery("INSERT INTO user_role VALUES(NULL,?)","s",
            $obj->getName());
    }

    public function update(UserRole $obj) : bool
    {
        return $this->db->writeQuery("UPDATE user_role SET name=? WHERE id=?","si",
            $obj->getName(),$obj->getId());
    }

    public function delete(int $id) : bool
    {
        return $this->db->writeQuery("DELETE FROM user_role WHERE id=?","i",$id);
    }

}
