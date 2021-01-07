<?php
namespace Repository;
use Model\Registrar;

use Repository\abstract\RegistrarRepositoryInterface;

class RegistrarRepository implements RegistrarRepositoryInterface
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function findAll() : array
    {
        $arr = array();
        $res = $this->db->readQuery("SELECT * FROM registrar");
        foreach ($res as $row) {
            array_push($arr,Registrar::fromAssocArray($row));
        }
        return $arr;
    }

    public function findById($id) : Registrar
    {
        return Registrar::fromAssocArray($this->db->readQuery("SELECT * FROM registrar WHERE id=?","i",$id)[0]);
    }

    public function create(Registrar $obj) : bool
    {
        return $this->db->writeQuery("INSERT INTO registrar VALUES(NULL,?,?,?)","sii",
            $obj->getFullname(),$obj->getUserId(),$obj->getUserRoleId());
    }

    public function update(Registrar $obj) : bool
    {
        return $this->db->writeQuery("UPDATE registrar SET fullname=?,user_id=?,user_role_id=? WHERE id=?","siii",
            $obj->getFullname(),$obj->getUserId(),$obj->getUserRoleId(),$obj->getId());
    }

    public function delete(int $id) : bool
    {
        return $this->db->writeQuery("DELETE FROM registrar WHERE id=?","i",$id);
    }

}
