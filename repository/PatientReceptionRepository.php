<?php
namespace Repository;
use Model\Appeal;
use Model\PatientReception;
use Repository\abstract\PatientReceptionRepositoryInterface;

class PatientReceptionRepository implements PatientReceptionRepositoryInterface
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function findAll() : array
    {
        $arr = array();
        $res = $this->db->readQuery("SELECT * FROM patient_reception");
        foreach ($res as $row) {
            array_push($arr,PatientReception::fromAssocArray($row));
        }
        return $arr;
    }

    public function getAllAppeals(int $id) : array{
        $arr = array();
        $res = $this->db->readQuery("SELECT appeal.* FROM appeal_has_patient_reception JOIN appeal ON 
        appeal.id=appeal_has_patient_reception.appeal_id WHERE patient_reception_id=?","i",$id);
        foreach ($res as $row) {
            array_push($arr,Appeal::fromAssocArray($row));
        }
        return $arr;
    }

    public function addAppeal(int $appeal_id,int $patient_reception_id) : void{
        $this->db->writeQuery("INSERT INTO appeal_has_patient_reception VALUES(?,?)","ii",$appeal_id,$patient_reception_id);
    }

    public function removeAppeal(int $patient_reception_id) : void{
        $this->db->writeQuery("DELETE FROM appeal_has_patient_reception WHERE patient_reception_id=?","i",$patient_reception_id);
    }

    public function findById($id) : PatientReception
    {
        return PatientReception::fromAssocArray($this->db->readQuery("SELECT * FROM patient_reception WHERE id=?","i",$id)[0]);
    }

    public function create(PatientReception $obj) : bool
    {
        return $this->db->writeQuery("INSERT INTO patient_reception VALUES(NULL,?,?,?)","sii",
            $obj->getDate()->format("Y-m-d"),$obj->getHourReceptionId(),$obj->getPatientId());
    }

    public function update(PatientReception $obj) : bool
    {
        return $this->db->writeQuery("UPDATE patient_reception SET date=?,hour_reception_id=?,patient_id=? WHERE id=?","siii",
            $obj->getDate()->format("Y-m-d"),$obj->getHourReceptionId(),$obj->getPatientId(),$obj->getId());
    }

    public function delete(int $id) : bool
    {
        return $this->db->writeQuery("DELETE FROM patient_reception WHERE id=?","i",$id);
    }

}
