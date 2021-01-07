<?php
namespace Repository;
use Model\Sale;
use Model\Service;
use Repository\abstract\SaleRepositoryInterface;

class SaleRepository implements SaleRepositoryInterface
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function findAll() : array
    {
        $arr = array();
        $res = $this->db->readQuery("SELECT * FROM sale");
        foreach ($res as $row) {
            array_push($arr,Sale::fromAssocArray($row));
        }
        return $arr;
    }

    public function getAllServices(int $id) : array{
        $arr = array();
        $res = $this->db->readQuery("SELECT service.* FROM service_has_sale JOIN service ON 
        service.id=service_has_sale.service_id WHERE sale_id=?","i",$id);
        foreach ($res as $row) {
            array_push($arr,Service::fromAssocArray($row));
        }
        return $arr;
    }

    public function addService(int $sale_id,int $service_id) : void{
        $this->db->writeQuery("INSERT INTO service_has_sale VALUES(?,?)","ii",$service_id,$sale_id);
    }

    public function removeService(int $sale_id) : void{
        $this->db->writeQuery("DELETE FROM service_has_sale WHERE sale_id=?","i",$sale_id);
    }

    public function findById($id) : Sale
    {
        return Sale::fromAssocArray($this->db->readQuery("SELECT * FROM sale WHERE id=?","i",$id)[0]);
    }

    public function create(Sale $obj) : bool
    {
        return $this->db->writeQuery("INSERT INTO sale VALUES(NULL,?,?,?,?)","ssis",
            $obj->getDateOfStart()->format("Y-m-d"),$obj->getDateOfEnd()->format("Y-m-d"),
            $obj->getSize(),$obj->getPromocode()
        );
    }

    public function update(Sale $obj) : bool
    {
        return $this->db->writeQuery("UPDATE sale SET date_of_start=?,date_of_end=?,size=?,promocode=? WHERE id=?","ssisi",
            $obj->getDateOfStart()->format("Y-m-d"),$obj->getDateOfEnd()->format("Y-m-d"),
            $obj->getSize(),$obj->getPromocode(),$obj->getId());
    }

    public function delete(int $id) : bool
    {
        return $this->db->writeQuery("DELETE FROM sale WHERE id=?","i",$id);
    }

}
