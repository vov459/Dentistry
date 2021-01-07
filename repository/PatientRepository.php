<?php
namespace Repository;
use Model\Medicine;
use Model\Patient;
use Repository\abstract\PatientRepositoryInterface;

class PatientRepository implements PatientRepositoryInterface
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function findAll() : array
    {
        $arr = array();
        $res = $this->db->readQuery("SELECT * FROM patient");
        foreach ($res as $row) {
            array_push($arr,Patient::fromAssocArray($row));
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

    public function findById($id) : Patient
    {
        return Patient::fromAssocArray($this->db->readQuery("SELECT * FROM patient WHERE id=?","i",$id)[0]);
    }

    public function create(Patient $obj) : bool
    {
        return $this->db->writeQuery("INSERT INTO patient VALUES(NULL,?,?,?,?,?,?,?,?,?)","ssssssssi",
            $obj->getSecondName(),$obj->getFirstName(),$obj->getPatronymic(),$obj->getPhone(),$obj->getPassport(),
        $obj->getHomeAddress(),$obj->getPolicyNumber(),$obj->getDateOfBirth()->format("Y-m-d"),$obj->getUserId());
    }

    public function update(Patient $obj) : bool
    {
        return $this->db->writeQuery("UPDATE patient SET second_name=?,first_name=?,patronymic=?,phone=?,
                  passport=?,home_address=?,policy_number=?,date_of_birth=?,user_id=? WHERE id=?","ssssssssii",
            $obj->getSecondName(),$obj->getFirstName(),$obj->getPatronymic(),$obj->getPhone(),$obj->getPassport(),
            $obj->getHomeAddress(),$obj->getPolicyNumber(),$obj->getDateOfBirth()->format("Y-m-d"),$obj->getUserId(),$obj->getId());
    }

    public function delete(int $id) : bool
    {
        return $this->db->writeQuery("DELETE FROM patient WHERE id=?","i",$id);
    }

}

