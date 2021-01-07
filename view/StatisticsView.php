<?php
namespace View;
use Repository\AppealRepository;
use View\ViewInterface;
use Repository\BD;
use Model\Appeal;
class AppealView implements ViewInterface{

    private BD $bd;
    public function __construct(BD $bd)
    {
        $this->bd = $bd;

    }

    public function render(): void
    {
        $rep = new AppealRepository($this->bd);
        $data = $rep->findAll();
        ?>
        <a href="/db_app/add/appeal" class="btn btn-success">Добавить</a><br><br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col1">Название</th>
                <th scope="col2" width="120px"></th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?= $row->getName() ?></td>

                </tr>

            </tbody>
        </table>
        <?php
    }
}
?>

