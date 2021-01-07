<?php
namespace Repository;
use Model\Service;
use Repository\abstract\ServiceRepositoryInterface;

class ServiceRepository implements ServiceRepositoryInterface
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function findAll() : array
    {
        $arr = array();
        $res = $this->db->readQuery("SELECT * FROM service");
        foreach ($res as $row) {
            array_push($arr,Service::fromAssocArray($row));
        }
        return $arr;
    }

    public function findById($id) : Service
    {
        return Service::fromAssocArray($this->db->readQuery("SELECT * FROM service WHERE id=?","i",$id)[0]);
    }

    public function create(Service $obj) : bool
    {
        return $this->db->writeQuery("INSERT INTO service VALUES(NULL,?,?,?)","ssi",
            $obj->getName(),$obj->getNumber(),$obj->getDoctorId());
    }

    public function update(Service $obj) : bool
    {
        return $this->db->writeQuery("UPDATE service SET name=?,number=?,doctor_id=? WHERE id=?","ssii",
            $obj->getName(),$obj->getNumber(),$obj->getDoctorId(),$obj->getId());
    }

    public function delete(int $id) : bool
    {
        return $this->db->writeQuery("DELETE FROM service WHERE id=?","i",$id);
    }


}
