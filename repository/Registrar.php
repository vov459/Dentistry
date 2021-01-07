<?php
namespace Repository;
use Model\Registrar;
use Repository\abstract\AppealRepositoryInterface;

class RegistrarRepository implements AppealRepositoryInterface
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function findAll() : array
    {
        $arr = array();
        $res = $this->db->readQuery("SELECT * FROM appeal");
        foreach ($res as $row) {
            array_push($arr,Appeal::fromAssocArray($row));
        }
        return $arr;
    }

    public function findById($id) : Appeal
    {
        return Appeal::fromAssocArray($this->db->readQuery("SELECT * FROM appeal WHERE id=?","i",$id)[0]);
    }

    public function create(Appeal $obj) : bool
    {
        return $this->db->writeQuery("INSERT INTO appeal VALUES(NULL,?)","s",
            $obj->getName());
    }

    public function update(Appeal $obj) : bool
    {
        return $this->db->writeQuery("UPDATE appeal SET name=? WHERE id=?","si",
            $obj->getName(),$obj->getId());
    }

    public function delete(int $id) : bool
    {
        return $this->db->writeQuery("DELETE FROM appeal WHERE id=?","i",$id);
    }

}
