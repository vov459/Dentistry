<?php
namespace View;
use Model\PatientReception;
use Repository\AppealRepository;
use View\ViewInterface;
use Repository\BD;
use Model\Appeal;
class AppealEditView implements ViewInterface{

    private BD $bd;
    private int $id;
    public function __construct(BD $bd,int $id)
    {
        $this->bd = $bd;
        $this->id = $id;
    }

    public function render(): void
    {
        $rep = new AppealRepository($this->bd);
        $data = $rep->findById($this->id);
        ?>
        <form action="/db_app/save/appeal">
            <input type="hidden" name="id" value="<?=$data->getId()?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Название</span>
                </div>
                <input required type="text" name="name" value="<?=$data->getName()?>" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>

        <?php
    }
}
?>

