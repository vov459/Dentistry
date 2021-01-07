<?php

namespace Repository;
use DateTime;

class PatientReception
{
    public static function fromAssocArray($arr) : PatientReception{
        $res = new PatientReception(null,null,null,null);
        foreach ($arr as $key=>$item){
            if($key == "date"){
                $res->$key = new DateTime($item);
            }else{
                $res->$key = $item;
            }

        }
        return $res;
    }
    private ?int $id;
    private ?DateTime $date;
    private ?int $hour_reception_id;
    private ?int $patient_id;
    public function __construct(?int $id, \DateTime|null $date, int|null $hour_reception_id, int|null $patient_id)
    {

        $this->id = $id;
        $this->date = $date;
        $this->hour_reception_id = $hour_reception_id;
        $this->patient_id = $patient_id;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return DateTime|null
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime|null $date
     */
    public function setDate(?DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return int|null
     */
    public function getHourReceptionId(): ?int
    {
        return $this->hour_reception_id;
    }

    /**
     * @param int|null $hour_reception_id
     */
    public function setHourReceptionId(?int $hour_reception_id): void
    {
        $this->hour_reception_id = $hour_reception_id;
    }

    /**
     * @return int|null
     */
    public function getPatientId(): ?int
    {
        return $this->patient_id;
    }

    /**
     * @param int|null $patient_id
     */
    public function setPatientId(?int $patient_id): void
    {
        $this->patient_id = $patient_id;
    }


}