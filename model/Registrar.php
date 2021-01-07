<?php

namespace Model;
use DateTime;

class Registrar
{
    public static function fromAssocArray($arr) : Registrar{
        $res = new Registrar(null, null,null,null);
        foreach ($arr as $key=>$item){
            $res->$key = $item;
        }
        return $res;
    }
    private ?int $id;
    private ?string $fullname;
    private ?int $user_id;
    private ?int $user_role_id;
    public function __construct(?int $id, ?string $fullname, ?int $user_id, ?int $user_role_id)
    {

        $this->id = $id;
        $this->fullname = $fullname;
        $this->user_id = $user_id;
        $this->user_role_id = $user_role_id;
    }


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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
    public function getUserRoleId(): ?int
    {
        return $this->user_role_id;
    }

    /**
     * @param int|null $user_role_id
     */
    public function setUserRoleId(?int $user_role_id): void
    {
        $this->user_role_id = $user_role_id;
    }


}
