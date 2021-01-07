<?php
namespace Repository;
use Model\HourReception;
use Repository\abstract\HourReceptionRepositoryInterface;

class HourReceptionRepository implements HourReceptionRepositoryInterface
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function findAll() : array
    {
        $arr = array();
        $res = $this->db->readQuery("SELECT * FROM hour_reception");
        foreach ($res as $row) {
            array_push($arr,HourReception::fromAssocArray($row));
        }
        return $arr;
    }

    public function findById($id) : HourReception
    {
        return HourReception::fromAssocArray($this->db->readQuery("SELECT * FROM hour_reception WHERE id=?","i",$id)[0]);
    }

    public function create(HourReception $obj) : bool
    {
        return $this->db->writeQuery("INSERT INTO hour_reception VALUES(NULL,?,?,?,?)","ssii",
            $obj->getHour()->format("H:i:s"),$obj->getDate()->format("Y-m-d"),
        $obj->getCabinet(),$obj->getDoctorId());
    }

    public function update(HourReception $obj) : bool
    {
        return $this->db->writeQuery("UPDATE hour_reception SET hour=?,date=?,cabinet=?,doctor_id=? WHERE id=?","ssiii",
            $obj->getHour()->format("H:i:s"),$obj->getDate()->format("Y-m-d"),
            $obj->getCabinet(),$obj->getDoctorId(),$obj->getId());
    }

    public function delete(int $id) : bool
    {
        return $this->db->writeQuery("DELETE FROM hour_reception WHERE id=?","i",$id);
    }

}
