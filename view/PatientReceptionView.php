<?php
namespace View;
use Repository\HourReceptionRepository;
use Repository\PatientReceptionRepository;
use Repository\PatientRepository;
use View\ViewInterface;
use Repository\BD;
use Model\PatientReception;
class PatientReceptionView implements ViewInterface{

    private BD $bd;
    public function __construct(BD $bd)
    {
        $this->bd = $bd;

    }

    public function render(): void
    {
        $rep = new PatientReceptionRepository($this->bd);
        $hourRep = new HourReceptionRepository($this->bd);
        $patientRep = new PatientRepository($this->bd);
        $data = $rep->findAll();
        ?>
        <a href="/db_app/add/patient_reception" class="btn btn-success">Добавить</a><br><br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col1">Дата</th>
                <th scope="col1">Час приема</th>
                <th scope="col1">Кабинет</th>
                <th scope="col1">Пациент</th>
                <th scope="col2" width="120px"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            /* @var $row PatientReception */
            foreach ($data as $row){
                $hour = $hourRep->findById($row->getHourReceptionId());
                $patient = $patientRep->findById($row->getPatientId());
                ?>
                <tr>
                    <td><?= $row->getDate()->format("Y-m-d") ?></td>
                    <td><?= $hour->getHour()->format("H:i:s") ?></td>
                    <td><?= $hour->getCabinet() ?></td>
                    <td><?= $patient->getSecondName()." ".$patient->getFirstName()." ".$patient->getPatronymic() ?></td>
                    <td><a href="/db_app/remove/patient_reception?id=<?=$row->getId();?>" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg></a>
                        <a href="/db_app/edit/patient_reception?id=<?=$row->getId();?>" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php
    }
}
?>

