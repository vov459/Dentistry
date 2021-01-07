<?php
namespace Repository;
use Model\Medicine;
use Repository\abstract\MedicineRepositoryInterface;

class MedicineRepository implements MedicineRepositoryInterface
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function findAll() : array
    {
        $arr = array();
        $res = $this->db->readQuery("SELECT * FROM medicine");
        foreach ($res as $row) {
            array_push($arr,Medicine::fromAssocArray($row));
        }
        return $arr;
    }

    public function findById($id) : Medicine
    {
        return Medicine::fromAssocArray($this->db->readQuery("SELECT * FROM medicine WHERE id=?","i",$id)[0]);
    }

    public function create(Medicine $obj) : bool
    {
        return $this->db->writeQuery("INSERT INTO medicine VALUES(NULL,?,?)","si",
            $obj->getName(),$obj->getPrice());
    }

    public function update(Medicine $obj) : bool
    {
        return $this->db->writeQuery("UPDATE medicine SET name=?,price=? WHERE id=?","sii",
            $obj->getName(),$obj->getPrice(),$obj->getId());
    }

    public function delete(int $id) : bool
    {
        return $this->db->writeQuery("DELETE FROM medicine WHERE id=?","i",$id);
    }

}
