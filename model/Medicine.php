<?php

namespace Model;
use DateTime;

class Medicine
{
    public static function fromAssocArray($arr) : Medicine{
        $res = new Medicine(null,null,null);
        foreach ($arr as $key=>$item){
            $res->$key = $item;
        }
        return $res;
    }
    private ?int $id;
    private ?string $name;
    private ?int $price;
    public function __construct(?int $id,?string $name,?int $price)
    {
        $this->name = $name;
        $this->id = $id;
        $this->price = $price;
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
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int|null $price
     */
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }


}
?>
