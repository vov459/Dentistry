<?php

namespace Model;
use DateTime;

class Patient
{
    public static function fromAssocArray($arr) : Patient{
        $res = new Patient(null,null,null,null,null,null,null,null,null,null);
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
    private ?int $user_id;
    public function __construct(
        int|null $id,
        null|string $second_name,
        null|string $first_name,
        null|string $patronymic,
        null|string $phone,
        null|string $passport,
        null|string $home_address,
        null|string $policy_number,
        DateTime|null $date_of_birth,?int $user_id)
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
        $this->user_id = $user_id;
    }

    /**
     * @return string|null
     */
    public function getSecondName(): ?string
    {
        return $this->second_name;
    }

    /**
     * @param string|null $second_name
     */
    public function setSecondName(?string $second_name): void
    {
        $this->second_name = $second_name;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * @param string|null $first_name
     */
    public function setFirstName(?string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string|null
     */
    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    /**
     * @param string|null $patronymic
     */
    public function setPatronymic(?string $patronymic): void
    {
        $this->patronymic = $patronymic;
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
     * @return string|null
     */
    public function getPassport(): ?string
    {
        return $this->passport;
    }

    /**
     * @param string|null $passport
     */
    public function setPassport(?string $passport): void
    {
        $this->passport = $passport;
    }

    /**
     * @return string|null
     */
    public function getHomeAddress(): ?string
    {
        return $this->home_address;
    }

    /**
     * @param string|null $home_address
     */
    public function setHomeAddress(?string $home_address): void
    {
        $this->home_address = $home_address;
    }

    /**
     * @return string|null
     */
    public function getPolicyNumber(): ?string
    {
        return $this->policy_number;
    }

    /**
     * @param string|null $policy_number
     */
    public function setPolicyNumber(?string $policy_number): void
    {
        $this->policy_number = $policy_number;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfBirth(): ?DateTime
    {
        return $this->date_of_birth;
    }

    /**
     * @param DateTime|null $date_of_birth
     */
    public function setDateOfBirth(?DateTime $date_of_birth): void
    {
        $this->date_of_birth = $date_of_birth;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * @param int|null $user_id
     */
    public function setUserId(?int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }


}
