<?php
namespace View;
use Model\Registrar;
use Model\User;
use Model\UserRole;
use Repository\RegistrarRepository;
use Repository\UserRepository;
use Repository\UserRoleRepository;

use Repository\BD;

class RegistrarAddView implements ViewInterface{

    private BD $bd;
    public function __construct(BD $bd)
    {
        $this->bd = $bd;
    }

    public function render(): void
    {
        $userRep = new UserRepository($this->bd);
        $userRoleRep = new UserRoleRepository($this->bd);
        $users = $userRep->findAll();
        $userRoles =
            $userRoleRep->findAll();
        ?>
        <form action="/db_app/insert/registrar">
            <input type="hidden" name="id" value="0">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">ФИО</span>
                </div>
                <input required type="text" name="fullname" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
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
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-dark text-white border-dark" for="inputGroupSelect02">Роль пользователя</label>
                </div>
                <select class="border-dark custom-select" id="inputGroupSelect02" name="user_role_id">
                    <?php
                    /* @var $item UserRole */
                    foreach ($userRoles as $item){
                        echo '<option selected value="'.$item->getId() .'">'.$item->getName().'</option>';
                    }?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>

        <?php
    }
}
?>

