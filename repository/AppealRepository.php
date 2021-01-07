<?php
namespace Repository;
use Model\Appeal;
use Model\PatientReception;
use Repository\abstract\AppealRepositoryInterface;

class AppealRepository implements AppealRepositoryInterface
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

    public function getStory(int $id) : array
    {
        $arr = array();
        $res = $this->db->readQuery("select  `appeal`.* from `patient`
right join `patient_reception` on `patient`.`id` = `patient_reception`.`patient_id`
right join `appeal_has_patient_reception` on `patient_reception`.`id` = `appeal_has_patient_reception`.`patient_reception_id`
right join `appeal` on `appeal_has_patient_reception`.`appeal_id` = `appeal`.`id`
where patient.id = ?","i",$id);
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
