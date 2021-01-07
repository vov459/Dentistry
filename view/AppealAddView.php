<?php
namespace View;
use Model\PatientReception;
use Repository\AppealRepository;
use View\ViewInterface;
use Repository\BD;
use Model\Appeal;

class AppealAddView implements ViewInterface{

    private BD $bd;
    private int $id;
    public function __construct(BD $bd)
    {
        $this->bd = $bd;
    }

    public function render(): void
    {
        ?>
        <form action="/db_app/insert/appeal">
            <input type="hidden" name="id" value="0">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-dark border-dark outline-dark text-white" id="basic-addon1">Название</span>
                </div>
                <input required type="text" name="name" class="border-dark form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>

        <?php
    }
}
?>

