<?php

namespace Repository;
use DateTime;

class Service
{
    public static function fromAssocArray($arr) : Service{
        $res = new Service(null, null,null,null);
        foreach ($arr as $key=>$item){
            $res->$key = $item;
        }
        return $res;
    }
    private ?int $id;
    private ?string $name;
    private ?int $number;
    private ?int $doctor_id;
    public function __construct(?int $id, ?string $name, int|null $number, int|null $doctor_id)
    {
        $this->name = $name;
        $this->id = $id;
        $this->number = $number;
        $this->doctor_id = $doctor_id;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int|null $number
     */
    public function setNumber(?int $number): void
    {
        $this->number = $number;
    }

    /**
     * @return int|null
     */
    public function getDoctorId(): ?int
    {
        return $this->doctor_id;
    }

    /**
     * @param int|null $doctor_id
     */
    public function setDoctorId(?int $doctor_id): void
    {
        $this->doctor_id = $doctor_id;
    }


}