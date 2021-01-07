<?php
namespace Repository;
use Model\User;
use Repository\abstract\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function findAll() : array
    {
        $arr = array();
        $res = $this->db->readQuery("SELECT * FROM user");
        foreach ($res as $row) {
            array_push($arr,User::fromAssocArray($row));
        }
        return $arr;
    }

    public function findById($id) : User
    {
        return User::fromAssocArray($this->db->readQuery("SELECT * FROM user WHERE id=?","i",$id)[0]);
    }

    public function create(User $obj) : bool
    {
        return $this->db->writeQuery("INSERT INTO user VALUES(NULL,?,md5(?))","ss",
            $obj->getLogin(),$obj->getPassword());
    }

    public function update(User $obj) : bool
    {
        return $this->db->writeQuery("UPDATE user SET login=?,password=? WHERE id=?","ssi",
            $obj->getLogin(),$obj->getPassword(),$obj->getId());
    }

    public function delete(int $id) : bool
    {
        return $this->db->writeQuery("DELETE FROM user WHERE id=?","i",$id);
    }

}
