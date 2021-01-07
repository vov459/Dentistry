<?php
namespace View;

use Model\Doctor;
use Repository\DoctorRepository;
use Repository\HourReceptionRepository;
use View\ViewInterface;
use Repository\BD;
use Model\HourReception;
class HourReceptionEditView implements ViewInterface{

    private BD $bd;
    private int $id;
    public function __construct(BD $bd,int $id)
    {
        $this->bd = $bd;
        $this->id = $id;
    }

    public function render(): void
    {
        $rep = new HourReceptionRepository($this->bd);
        $data = $rep->findById($this->id);
        $doctorRep = new DoctorRepository($this->bd);
        $doctors = $doctorRep->findAll();

        ?>
        <form action="/db_app/save/hour_reception">
            <input type="hidden" name="id" value="<?=$data->getId()?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Время</span>
                </div>
                <input required type="text" name="hour" value="<?=$data->getHour()->format("H:i:s")?>" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Дата</span>
                </div>
                <input required type="text" name="date" value="<?=$data->getDate()->format("Y-m-d")?>" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Кабинет</span>
                </div>
                <input required type="text" name="cabinet" value="<?=$data->getCabinet()?>" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-dark text-white border-dark" for="inputGroupSelect02">Доктор</label>
                </div>
                <select class="border-dark custom-select" id="inputGroupSelect02" name="doctor_id">
                    <?php
                    /* @var $item Doctor */
                    foreach ($doctors as $item){
                        if($item->getId() == $data->getDoctorId()){
                            echo '<option selected value="'.$item->getId() .'">'.$item->getFullname().'</option>';
                        }else{
                            echo '<option value="'.$item->getId().'">'.$item->getFullname().'</option>';
                        }

                    }?>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>

        <?php
    }
}
?>

