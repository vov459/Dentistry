<?php
namespace Repository;
use Model\Doctor;
use Model\Medicine;
use Repository\abstract\DoctorRepositoryInterface;

class DoctorRepository implements DoctorRepositoryInterface
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function findAll() : array
    {
        $arr = array();
        $res = $this->db->readQuery("SELECT * FROM doctor");
        foreach ($res as $row) {
            array_push($arr,Doctor::fromAssocArray($row));
        }
        return $arr;
    }

    public function getAllMedicines(int $id) : array{
        $arr = array();
        $res = $this->db->readQuery("SELECT medicine.* FROM doctor_has_medicine JOIN medicine ON 
        medicine.id=doctor_has_medicine.medicine_id WHERE doctor_id=?","i",$id);
        foreach ($res as $row) {
            array_push($arr,Medicine::fromAssocArray($row));
        }
        return $arr;
    }

    public function addMedicine(int $doctor_id,int $medicineId) : void{
        $this->db->writeQuery("INSERT INTO doctor_has_medicine VALUES(?,?)","ii",$doctor_id,$medicineId);
    }

    public function removeMedicines(int $doctor_id) : void{
        $this->db->writeQuery("DELETE FROM doctor_has_medicine WHERE doctor_id=?","i",$doctor_id);
    }

    public function findById($id) : Doctor
    {
        return Doctor::fromAssocArray($this->db->readQuery("SELECT * FROM doctor WHERE id=?","i",$id)[0]);
    }

    public function create(Doctor $obj) : bool
    {
        return $this->db->writeQuery("INSERT INTO doctor VALUES(NULL,?,?)","ss",
            $obj->getFullname(),$obj->getPhone());
    }

    public function update(Doctor $obj) : bool
    {
        return $this->db->writeQuery("UPDATE doctor SET fullname=?,phone=? WHERE id=?","ssi",
            $obj->getFullname(),$obj->getPhone(),$obj->getId());
    }

    public function delete(int $id) : bool
    {
        return $this->db->writeQuery("DELETE FROM doctor WHERE id=?","i",$id);
    }

}
