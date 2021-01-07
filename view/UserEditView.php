<?php
namespace View;
use Model\User;
use Repository\UserRepository;
use View\ViewInterface;
use Repository\BD;

class UserEditView implements ViewInterface{

    private BD $bd;
    private int $id;
    public function __construct(BD $bd,int $id)
    {
        $this->bd = $bd;
        $this->id = $id;
    }

    public function render(): void
    {
        $rep = new UserRepository($this->bd);
        $data = $rep->findById($this->id);
        ?>
        <form action="/db_app/save/user">
            <input type="hidden" name="id" value="<?=$data->getId()?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Логин</span>
                </div>
                <input required type="text" name="login" value="<?=$data->getLogin()?>" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Пароль</span>
                </div>
                <input required type="text" name="password" value="<?=$data->getPassword()?>" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>

        <?php
    }
}
?>

