<?php

namespace Repository;
use DateTime;

class Appeal
{
    public static function fromAssocArray($arr) : Appeal{
        $res = new Appeal(null,null);
        foreach ($arr as $key=>$item){
            $res->$key = $item;
        }
        return $res;
    }
    private ?int $id;
    private ?string $name;
    public function __construct(?int $id,?string $name)
    {
        $this->name = $name;
        $this->id = $id;
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


}