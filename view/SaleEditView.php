<?php
namespace View;
use Model\Sale;
use Model\Service;
use Repository\SaleRepository;
use Repository\ServiceRepository;
use View\ViewInterface;
use Repository\BD;

class SaleEditView implements ViewInterface{

    private BD $bd;
    private int $id;
    public function __construct(BD $bd,int $id)
    {
        $this->bd = $bd;
        $this->id = $id;
    }

    public function render(): void
    {
        $rep = new SaleRepository($this->bd);
        $data = $rep->findById($this->id);
        $servicesRep = new ServiceRepository($this->bd);
        $services = $servicesRep->findAll();

        $addedServices = $rep->getAllServices($data->getId());

        ?>
        <form action="/db_app/save/sale">
            <input type="hidden" name="id" value="<?=$data->getId()?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Дата начала</span>
                </div>
                <input required type="text" name="date_of_start" value="<?=$data->getDateOfStart()->format("Y-m-d")?>" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Дата окончания</span>
                </div>
                <input required type="text" name="date_of_end" value="<?=$data->getDateOfEnd()->format("Y-m-d")?>" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Размер</span>
                </div>
                <input required type="text" name="size" value="<?=$data->getSize()?>" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                <div class="input-group-append">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white">%</span>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Промокод</span>
                </div>
                <input required type="text" name="promocode" value="<?=$data->getPromocode()?>" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">

            </div>
            <div class="medicines_wrap">
                <?php
                /* @var $addedService Service */
                foreach($addedServices as $i=>$addedService){
                    ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">

                            <label class="input-group-text bg-dark text-white border-dark" for="inputGroupSelect02">Услуга</label>
                            <button class="btn btn-danger remove_medicine" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg></button>
                        </div>
                        <select class="custom-select medicineSelect border-dark" name="service_id[]">
                            <?php
                            /* @var $item Service */
                            foreach ($services as $item){
                                if($item->getId() == $addedService->getId()){
                                    echo '<option selected value="'.$item->getId() .'">'.$item->getName().'</option>';
                                }else{
                                    echo '<option value="'.$item->getId().'">'.$item->getName().'</option>';
                                }

                            }?>
                        </select>
                    </div>
                <?php } ?>
            </div>
            <a href="#" class="btn btn-success " id="add_medicine">Добавить услугу</a><br><br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>

        <script>
            $(function(){
                $("#add_medicine").click(function(e){
                    e.preventDefault();
                    $(".medicines_wrap").append(
                        '<div class="input-group mb-3"><div class="input-group-prepend">'+
                        '<label class="input-group-text bg-dark text-white border-dark" >Услуга</label>'+
                        '<button class="btn btn-danger remove_medicine" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">'+
                        '<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>'+
                        '</svg></button></div>'+
                        '<select class="border-dark custom-select medicineSelect" name="service_id[]">' +
                        $("#medicinesOptions").html()+
                        '</select></div>'
                    );
                    $(".remove_medicine").click(function(e){
                        e.preventDefault();
                        $(this).parent().parent().remove();
                    })
                })

                $(".remove_medicine").click(function(e){
                    e.preventDefault();
                    $(this).parent().parent().remove();
                })


            })
        </script>

        <div id="medicinesOptions" style="display: none">
            <?php
            /* @var $item Service */
            foreach ($services as $item){
                echo '<option value="'.$item->getId().'">'.$item->getName().'</option>';
            }?>
        </div>
        <?php

    }
}
?>

