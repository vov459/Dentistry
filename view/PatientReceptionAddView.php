<?php
namespace View;
use Model\Appeal;
use Model\HourReception;
use Model\Patient;
use Model\PatientReception;
use Repository\AppealRepository;
use Repository\HourReceptionRepository;
use Repository\PatientReceptionRepository;
use Repository\PatientRepository;
use View\ViewInterface;
use Repository\BD;

class PatientReceptionAddView implements ViewInterface{

    private BD $bd;
    public function __construct(BD $bd)
    {
        $this->bd = $bd;
    }

    public function render(): void
    {
        $hourRep = new HourReceptionRepository($this->bd);
        $patientsRep = new PatientRepository($this->bd);
        $hours = $hourRep->findAll();
        $patients = $patientsRep->findAll();
        $appealsRep = new AppealRepository($this->bd);
        $appeals = $appealsRep->findAll();
        ?>
        <form action="/db_app/insert/patient_reception">
            <input type="hidden" name="id" value="0">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Дата</span>
                </div>
                <input required type="text" name="date"  class="border-dark form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Дата</span>
                </div>
                <input required type="text" name="date" class="border-dark form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-dark text-white border-dark" for="inputGroupSelect02">Час приема</label>
                </div>
                <select class="border-dark custom-select" id="inputGroupSelect02" name="hour_reception_id">
                    <?php
                    /* @var $item HourReception */
                    foreach ($hours as $item){
                        echo '<option value="'.$item->getId() .'">'.$item->getHour()->format("H:i:s").
                            " кабинет: ".$item->getDoctorId().'</option>';

                    }?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-dark text-white border-dark" for="inputGroupSelect02">Пациент</label>
                </div>
                <select class="border-dark custom-select" id="inputGroupSelect02" name="patient_id">
                    <?php
                    /* @var $item Patient */
                    foreach ($patients as $item){
                        echo '<option value="'.$item->getId() .'">'.
                            $item->getSecondName()." ".$item->getFirstName()." ".$item->getPatronymic().'</option>';

                    }?>
                </select>
            </div>
            <div class="medicines_wrap">

            </div>
            <a href="#" class="btn btn-success " id="add_medicine">Добавить жалобу</a><br><br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
        <script>
            $(function(){
                $("#add_medicine").click(function(e){
                    e.preventDefault();
                    $(".medicines_wrap").append(
                        '<div class="input-group mb-3"><div class="input-group-prepend">'+
                        '<label class="input-group-text bg-dark text-white border-dark" >Жалоба</label>'+
                        '<button class="btn btn-danger remove_medicine" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">'+
                        '<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>'+
                        '</svg></button></div>'+
                        '<select class="border-dark custom-select medicineSelect" name="appeal_id[]">' +
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
            /* @var $item Appeal */
            foreach ($appeals as $item){
                echo '<option value="'.$item->getId().'">'.$item->getName().'</option>';
            }?>
        </div>

        <?php
    }
}
?>

