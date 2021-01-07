<?php

namespace Repository;
use DateTime;

class HourReception
{
    public static function fromAssocArray($arr) : HourReception{
        $res = new HourReception(null,null,null,null,null);
        foreach ($arr as $key=>$item){
            if($key == "hour" || $key == "date"){
                $res->$key = new DateTime($item);
            }else{
                $res->$key = $item;
            }

        }
        return $res;
    }
    private ?int $id;
    private ?int $cabinet;
    private ?int $doctor_id;
    private ?DateTime $hour;
    private ?DateTime $date;

    public function __construct(?int $id,?DateTime $hour, ?DateTime $date, ?int $cabinet, ?int $doctor_id)
    {
        $this->id = $id;
        $this->cabinet = $cabinet;
        $this->doctor_id = $doctor_id;
        $this->hour = $hour;
        $this->date = $date;
    }


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getCabinet(): ?int
    {
        return $this->cabinet;
    }

    /**
     * @param int|null $cabinet
     */
    public function setCabinet(?int $cabinet): void
    {
        $this->cabinet = $cabinet;
    }

    /**
     * @return int|null
     */
    public function getDoctorId(): ?int
    {
        return $this->doctor_id;
    }

    /**
     * @param int|null $doctorId
     */
    public function setDoctorId(?int $doctor_id): void
    {
        $this->doctor_id = $doctor_id;
    }

    /**
     * @return DateTime|null
     */
    public function getHour(): ?DateTime
    {
        return $this->hour;
    }

    /**
     * @param DateTime|null $hour
     */
    public function setHour(?DateTime $hour): void
    {
        $this->hour = $hour;
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


}