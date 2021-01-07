<?php
namespace View;
use Model\Doctor;
use Model\Service;
use Repository\DoctorRepository;
use Repository\ServiceRepository;
use View\ViewInterface;
use Repository\BD;

class ServiceAddView implements ViewInterface{

    private BD $bd;
    public function __construct(BD $bd)
    {
        $this->bd = $bd;
    }

    public function render(): void
    {
        $doctorRep = new DoctorRepository($this->bd);
        $doctors = $doctorRep->findAll();
        ?>
        <form action="/db_app/save/service">
            <input type="hidden" name="id" value="0">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Название</span>
                </div>
                <input required type="text" name="name" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Номер</span>
                </div>
                <input required type="text" name="number" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-dark text-white border-dark" for="inputGroupSelect02">Доктор</label>
                </div>
                <select class="border-dark custom-select" id="inputGroupSelect02" name="doctor_id">
                    <?php
                    /* @var $item Doctor */
                    foreach ($doctors as $item){
                        echo '<option selected value="'.$item->getId() .'">'.$item->getFullname().'</option>';
                    }?>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>

        <?php
    }
}
?>

