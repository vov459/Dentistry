<?php
namespace View;
use Model\Medicine;
use Repository\DoctorRepository;
use Repository\MedicineRepository;
use View\ViewInterface;
use Repository\BD;
use Model\Doctor;
class DoctorEditView implements ViewInterface{

    private BD $bd;
    private int $id;
    public function __construct(BD $bd,int $id)
    {
        $this->bd = $bd;
        $this->id = $id;
    }

    public function render(): void
    {
        $rep = new DoctorRepository($this->bd);
        $medicineRep = new MedicineRepository($this->bd);
        $data = $rep->findById($this->id);
        $addedMedicines = $rep->getAllMedicines($data->getId());
        $medicines = $medicineRep->findAll();
        ?>
        <form action="/db_app/save/doctor">
            <input type="hidden" name="id" value="<?=$data->getId()?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">ФИО</span>
                </div>
                <input required type="text" name="fullname" value="<?=$data->getFullname()?>" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Телефон</span>
                </div>
                <input required type="text" name="phone" value="<?=$data->getPhone()?>" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="medicines_wrap">
                <?php
                /* @var $item Medicine */
                foreach($addedMedicines as $i=>$addedMedicine){
                    ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">

                            <label class="input-group-text bg-dark text-white border-dark" for="inputGroupSelect02">Лекарство</label>
                            <button class="btn btn-danger remove_medicine" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg></button>
                        </div>
                        <select class="custom-select medicineSelect border-dark" name="medicine_id[]">
                            <?php
                            /* @var $item Medicine */
                            foreach ($medicines as $item){
                                if($item->getId() == $addedMedicine->getId()){
                                    echo '<option selected value="'.$item->getId() .'">'.$item->getName().'</option>';
                                }else{
                                    echo '<option value="'.$item->getId().'">'.$item->getName().'</option>';
                                }

                            }?>
                        </select>
                    </div>
                <?php } ?>
            </div>
            <a href="#" class="btn btn-success " id="add_medicine">Добавить лекарство</a><br><br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
        <script>
            $(function(){
                $("#add_medicine").click(function(e){
                    e.preventDefault();
                    $(".medicines_wrap").append(
                        '<div class="input-group mb-3"><div class="input-group-prepend">'+
                        '<label class="input-group-text bg-dark text-white border-dark" >Лекарство</label>'+
                        '<button class="btn btn-danger remove_medicine" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">'+
                        '<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>'+
                        '</svg></button></div>'+
                        '<select class="border-dark custom-select medicineSelect" name="medicine_id[]">' +
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
            /* @var $item Medicine */
            foreach ($medicines as $item){
                echo '<option value="'.$item->getId().'">'.$item->getName().'</option>';
            }?>
        </div>
        <?php
    }
}
?>

