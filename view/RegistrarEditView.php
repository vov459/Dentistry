<?php
namespace View;
use Model\Registrar;
use Model\User;
use Model\UserRole;
use Repository\RegistrarRepository;
use Repository\UserRepository;
use Repository\UserRoleRepository;
use View\ViewInterface;
use Repository\BD;

class RegistrarEditView implements ViewInterface{

    private BD $bd;
    private int $id;
    public function __construct(BD $bd,int $id)
    {
        $this->bd = $bd;
        $this->id = $id;
    }

    public function render(): void
    {
        $rep = new RegistrarRepository($this->bd);
        $data = $rep->findById($this->id);
        $userRep = new UserRepository($this->bd);
        $userRoleRep = new UserRoleRepository($this->bd);
        $users = $userRep->findAll();
        $userRoles =
            $userRoleRep->findAll();
        ?>
        <form action="/db_app/save/registrar">
            <input type="hidden" name="id" value="<?=$data->getId()?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">ФИО</span>
                </div>
                <input required type="text" name="fullname" value="<?=$data->getFullname()?>" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-dark text-white border-dark" for="inputGroupSelect02">Пользователь</label>
                </div>
                <select class="border-dark custom-select" id="inputGroupSelect02" name="user_id">
                    <?php
                    /* @var $item User */
                    foreach ($users as $item){
                        if($item->getId() == $data->getUserId()){
                            echo '<option selected value="'.$item->getId() .'">'.$item->getLogin().'</option>';
                        }else{
                            echo '<option value="'.$item->getId().'">'.$item->getLogin().'</option>';
                        }

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
                        if($item->getId() == $data->getUserRoleId()){
                            echo '<option selected value="'.$item->getId() .'">'.$item->getName().'</option>';
                        }else{
                            echo '<option value="'.$item->getId().'">'.$item->getName().'</option>';
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

