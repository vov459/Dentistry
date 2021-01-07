<?php

namespace Repository;
use DateTime;

class Patient
{
    public static function fromAssocArray($arr) : Patient{
        $res = new Patient(null,null,null,null,null,null,null,null,null);
        foreach ($arr as $key=>$item){
            if($key == "date_of_birth"){
                $res->$key = new DateTime($item);
            }else{
                $res->$key = $item;
            }

        }
        return $res;
    }
    private ?int $id;
    private ?string $second_name;
    private ?string $first_name;
    private ?string $patronymic;
    private ?string $phone;
    private ?string $passport;
    private ?string $home_address;
    private ?string $policy_number;
    private ?DateTime $date_of_birth;
    public function __construct(
        int|null $id,
        null|string $second_name,
        null|string $first_name,
        null|string $patronymic,
        null|string $phone,
        null|string $passport,
        null|string $home_address,
        null|string $policy_number,
        DateTime|null $date_of_birth)
    {


        $this->id = $id;
        $this->second_name = $second_name;
        $this->first_name = $first_name;
        $this->patronymic = $patronymic;
        $this->phone = $phone;
        $this->passport = $passport;
        $this->home_address = $home_address;
        $this->policy_number = $policy_number;
        $this->date_of_birth = $date_of_birth;
    }






}
