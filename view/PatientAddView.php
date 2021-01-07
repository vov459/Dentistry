<?php
namespace View;
use Model\Medicine;
use Model\Patient;
use Model\User;
use Repository\MedicineRepository;
use Repository\PatientRepository;
use Repository\UserRepository;
use View\ViewInterface;
use Repository\BD;

class PatientAddView implements ViewInterface{

    private BD $bd;

    public function __construct(BD $bd)
    {
        $this->bd = $bd;

    }

    public function render(): void
    {
        $userRep = new UserRepository($this->bd);
        $users = $userRep->findAll();
        $medicineRep = new MedicineRepository($this->bd);
        $medicines = $medicineRep->findAll();

        ?>
        <form action="/db_app/insert/patient">
            <input type="hidden" name="id" value="0">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Фамилия</span>
                </div>
                <input required type="text" name="second_name" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Имя</span>
                </div>
                <input required type="text" name="first_name" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Отчество</span>
                </div>
                <input required type="text" name="patronymic" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Телефон</span>
                </div>
                <input required type="text" name="phone" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Паспорт</span>
                </div>
                <input required type="text" name="passport" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Домашний адрес</span>
                </div>
                <input required type="text" name="home_address" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Номер полиса</span>
                </div>
                <input required type="text" name="policy_number" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Дата рождения</span>
                </div>
                <input required type="text" name="date_of_birth" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-dark text-white border-dark" for="inputGroupSelect02">Пользователь</label>
                </div>
                <select class="border-dark custom-select" id="inputGroupSelect02" name="user_id">
                    <?php
                    /* @var $item User */
                    foreach ($users as $item){
                        echo '<option value="'.$item->getId().'">'.$item->getLogin().'</option>';
                    }?>
                </select>
            </div>
            <div class="medicines_wrap">

            </div>
            <a href="#" class="btn btn-success " id="add_medicine">Добавить лекарство</a><br><br>

            <button type="submit" class="btn btn-success">Сохранить</button><br><br>
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


