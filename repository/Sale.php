<?php

namespace Repository;
use DateTime;

class Sale
{
    public static function fromAssocArray($arr) : Sale{
        $res = new Sale(null,null,null,null,null);
        foreach ($arr as $key=>$item){
            if($key == "date_of_start" || $key == "date_of_end"){
                $res->$key = new DateTime($item);
            }else{
                $res->$key = $item;
            }
        }
        return $res;
    }
    private ?int $id;
    private ?DateTime $date_of_start;
    private ?DateTime $date_of_end;
    private ?int $size;
    private ?string $promocode;
    public function __construct(?int $id,
                                ?DateTime $date_of_start,
                                ?DateTime $date_of_end,
                                ?int $size,
                                ?string $promocode)
    {
        $this->id = $id;
        $this->date_of_start = $date_of_start;
        $this->date_of_end = $date_of_end;
        $this->size = $size;
        $this->promocode = $promocode;
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
    public function getDateOfStart(): ?DateTime
    {
        return $this->date_of_start;
    }

    /**
     * @param DateTime|null $date_of_start
     */
    public function setDateOfStart(?DateTime $date_of_start): void
    {
        $this->date_of_start = $date_of_start;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfEnd(): ?DateTime
    {
        return $this->date_of_end;
    }

    /**
     * @param DateTime|null $date_of_end
     */
    public function setDateOfEnd(?DateTime $date_of_end): void
    {
        $this->date_of_end = $date_of_end;
    }

    /**
     * @return string|null
     */
    public function getPromocode(): ?string
    {
        return $this->promocode;
    }

    /**
     * @param string|null $promocode
     */
    public function setPromocode(?string $promocode): void
    {
        $this->promocode = $promocode;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @param int|null $size
     */
    public function setSize(?int $size): void
    {
        $this->size = $size;
    }


}