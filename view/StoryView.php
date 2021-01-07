<?php
namespace View;
use Model\PatientReception;
use Repository\AppealRepository;
use Repository\PatientRepository;
use View\ViewInterface;
use Repository\BD;
use Model\Appeal;
class StoryView implements ViewInterface{

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
        $patientRep = new PatientRepository($this->bd);
        $pat = $patientRep->findById($this->id);
        $data = $rep->getStory($this->id);
        ?>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col1"><?= $pat->getSecondName()." ".$pat->getFirstName()." ".$pat->getPatronymic()?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            /* @var $row Appeal */
            foreach ($data as $row){
                ?>
                <tr>
                    <td><?= $row->getName() ?></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php
    }
}
?>

