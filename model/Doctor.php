<?php

namespace Model;
use DateTime;

class Doctor
{
    public static function fromAssocArray($arr) : Doctor{
        $res = new Doctor(null,null,null);
        foreach ($arr as $key=>$item){
            $res->$key = $item;
        }
        return $res;
    }
    private ?int $id;
    private ?string $fullname;
    private ?string $phone;
    public function __construct(?int $id,?string $fullname, ?string $phone)
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->phone = $phone;
    }



    /**
     * @return string|null
     */
    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    /**
     * @param string|null $fullname
     */
    public function setFullname(?string $fullname): void
    {
        $this->fullname = $fullname;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }


}