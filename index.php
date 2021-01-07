<?php

require_once 'vendor/autoload.php';

use Repository\BD;

$route = explode('?', $_SERVER['REQUEST_URI'])[0];
$route = explode('/', $route);
$bd = new BD();

if(count($route) == 3 && $route[2] == ""){
    header("Location: /db_app/patients");
    exit;
}

if(count($route) == 3){
    include_once "./header.php";
    if($route[2] == "appeals"){
        $view = new \View\AppealView($bd);
        $view->render();
    }else if($route[2] == "doctors"){
        $view = new \View\DoctorView($bd);
        $view->render();
    }else if($route[2] == "hour_receptions"){
        $view = new \View\HourReceptionView($bd);
        $view->render();
    }else if($route[2] == "medicines"){
        $view = new \View\MedicineView($bd);
        $view->render();
    }else if($route[2] == "patients"){
        $view = new \View\PatientView($bd);
        $view->render();
    }else if($route[2] == "patient_receptions"){
        $view = new \View\PatientReceptionView($bd);
        $view->render();
    }else if($route[2] == "registrar"){
        $view = new \View\RegistrarView($bd);
        $view->render();
    }else if($route[2] == "sales"){
        $view = new \View\SaleView($bd);
        $view->render();
    }else if($route[2] == "services"){
        $view = new \View\ServiceView($bd);
        $view->render();
    }else if($route[2] == "users"){
        $view = new \View\UserView($bd);
        $view->render();
    }else if($route[2] == "user_roles"){
        $view = new \View\UserRoleView($bd);
        $view->render();
    }else if($route[2] == "story"){
        $view = new \View\StoryView($bd,$_GET["id"]);
        $view->render();
    }

}else if(count($route) == 4 && $route[2] == "edit"){
    include_once "./header.php";
    echo "<div class='col-md-7 mx-auto'>";
    if($route[3] == "appeal"){
        $view = new \View\AppealEditView($bd,$_GET["id"]);
        $view->render();
    }else if($route[3] == "doctor"){
        $view = new \View\DoctorEditView($bd,$_GET["id"]);
        $view->render();
    }else if($route[3] == "hour_reception"){
        $view = new \View\HourReceptionEditView($bd,$_GET["id"]);
        $view->render();
    }else if($route[3] == "medicine"){
        $view = new \View\MedicineEditView($bd,$_GET["id"]);
        $view->render();
    }else if($route[3] == "patient"){
        $view = new \View\PatientEditView($bd,$_GET["id"]);
        $view->render();
    }else if($route[3] == "patient_reception"){
        $view = new \View\PatientReceptionEditView($bd,$_GET["id"]);
        $view->render();
    }else if($route[3] == "registrar"){
        $view = new \View\RegistrarEditView($bd,$_GET["id"]);
        $view->render();
    }else if($route[3] == "sale"){
        $view = new \View\SaleEditView($bd,$_GET["id"]);
        $view->render();
    }else if($route[3] == "service"){
        $view = new \View\ServicesEditView($bd,$_GET["id"]);
        $view->render();
    }else if($route[3] == "user"){
        $view = new \View\UserEditView($bd,$_GET["id"]);
        $view->render();
    }else if($route[3] == "user_role"){
        $view = new \View\UserRoleEditView($bd,$_GET["id"]);
        $view->render();
    }
    echo "</div>";


}else if(count($route) == 4 && $route[2] == "add"){
    include_once "./header.php";
    echo "<div class='col-md-7 mx-auto'>";
    if($route[3] == "appeal"){
        $view = new \View\AppealAddView($bd);
        $view->render();
    }else if($route[3] == "doctor"){
        $view = new \View\DoctorAddView($bd);
        $view->render();
    }else if($route[3] == "hour_reception"){
        $view = new \View\HourReceptionAddView($bd);
        $view->render();
    }else if($route[3] == "medicine"){
        $view = new \View\MedicineAddView($bd);
        $view->render();
    }else if($route[3] == "patient"){
        $view = new \View\PatientAddView($bd);
        $view->render();
    }else if($route[3] == "patient_reception"){
        $view = new \View\PatientReceptionAddView($bd);
        $view->render();
    }else if($route[3] == "registrar"){
        $view = new \View\RegistrarAddView($bd);
        $view->render();
    }else if($route[3] == "sale"){
        $view = new \View\SaleAddView($bd);
        $view->render();
    }else if($route[3] == "service"){
        $view = new \View\ServiceAddView($bd);
        $view->render();
    }else if($route[3] == "user"){
        $view = new \View\UserAddView($bd);
        $view->render();
    }else if($route[3] == "user_role"){
        $view = new \View\UserRoleAddView($bd);
        $view->render();
    }
    echo "</div>";


}else if(count($route) == 4 && $route[2] == "save"){
    if($route[3] == "appeal"){
        $rep = new \Repository\AppealRepository($bd);
        $rep->update(\Model\Appeal::fromAssocArray($_GET));
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "doctor"){
        $rep = new \Repository\DoctorRepository($bd);
        $rep->update(\Model\Doctor::fromAssocArray($_GET));
        $rep->removeMedicines($_GET["id"]);
        if(isset($_GET['medicine_id']))foreach($_GET['medicine_id'] as $med_id)$rep->addMedicine($_GET["id"],$med_id);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "hour_reception"){
        $rep = new \Repository\HourReceptionRepository($bd);
        $rep->update(\Model\HourReception::fromAssocArray($_GET));
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "medicine"){
        $rep = new \Repository\MedicineRepository($bd);
        $rep->update(\Model\Medicine::fromAssocArray($_GET));
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "patient"){
        $rep = new \Repository\PatientRepository($bd);
        $rep->update(\Model\Patient::fromAssocArray($_GET));
        $rep->removeMedicines($_GET["id"]);
        if(isset($_GET['medicine_id']))foreach($_GET['medicine_id'] as $med_id)$rep->addMedicine($_GET["id"],$med_id);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "patient_reception"){
        $rep = new \Repository\PatientReceptionRepository($bd);
        $rep->removeAppeal($_GET["id"]);
        if(isset($_GET['appeal_id']))foreach($_GET['appeal_id'] as $app_id)$rep->addAppeal($app_id,$_GET["id"]);
        $rep->update(\Model\PatientReception::fromAssocArray($_GET));
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "registrar"){
        $rep = new \Repository\RegistrarRepository($bd);
        $rep->update(\Model\Registrar::fromAssocArray($_GET));
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "sale"){
        $rep = new \Repository\SaleRepository($bd);
        $rep->update(\Model\Sale::fromAssocArray($_GET));
        $rep->removeService($_GET["id"]);
        if(isset($_GET['service_id']))foreach($_GET['service_id'] as $serv_id)$rep->addService($_GET["id"],$serv_id);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "service"){
        $rep = new \Repository\ServiceRepository($bd);
        $rep->update(\Model\Service::fromAssocArray($_GET));
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "user"){
        $rep = new \Repository\UserRepository($bd);
        $rep->update(\Model\User::fromAssocArray($_GET));
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "user_role"){
        $rep = new \Repository\UserRoleRepository($bd);
        $rep->update(\Model\UserRole::fromAssocArray($_GET));
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}else if(count($route) == 4 && $route[2] == "remove"){
    if($route[3] == "appeal"){
        $rep = new \Repository\AppealRepository($bd);
        $rep->delete($_GET["id"]);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "doctor"){
        $rep = new \Repository\DoctorRepository($bd);
        $rep->delete($_GET["id"]);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "hour_reception"){
        $rep = new \Repository\HourReceptionRepository($bd);
        $rep->delete($_GET["id"]);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "medicine"){
        $rep = new \Repository\MedicineRepository($bd);
        $rep->delete($_GET["id"]);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "patient"){
        $rep = new \Repository\PatientRepository($bd);
        $rep->delete($_GET["id"]);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "patient_reception"){
        $rep = new \Repository\PatientReceptionRepository($bd);
        $rep->delete($_GET["id"]);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "registrar"){
        $rep = new \Repository\RegistrarRepository($bd);
        $rep->delete($_GET["id"]);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "sale"){
        $rep = new \Repository\SaleRepository($bd);
        $rep->delete($_GET["id"]);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "service"){
        $rep = new \Repository\ServiceRepository($bd);
        $rep->delete($_GET["id"]);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "user"){
        $rep = new \Repository\UserRepository($bd);
        $rep->delete($_GET["id"]);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else if($route[3] == "user_role"){
        $rep = new \Repository\UserRoleRepository($bd);
        $rep->delete($_GET["id"]);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}else if(count($route) == 4 && $route[2] == "insert"){
    if($route[3] == "appeal"){
        $rep = new \Repository\AppealRepository($bd);
        $rep->create(\Model\Appeal::fromAssocArray($_GET));
        header("Location: /db_app/appeals");
    }else if($route[3] == "doctor"){
        $rep = new \Repository\DoctorRepository($bd);
        $rep->create(\Model\Doctor::fromAssocArray($_GET));
        if(isset($_GET['medicine_id']))foreach($_GET['medicine_id'] as $med_id)$rep->addMedicine($_GET["id"],$med_id);
        header("Location: /db_app/doctors");
    }else if($route[3] == "hour_reception"){
        $rep = new \Repository\HourReceptionRepository($bd);
        $rep->create(\Model\HourReception::fromAssocArray($_GET));
        header("Location: /db_app/hour_receptions");
    }else if($route[3] == "medicine"){
        $rep = new \Repository\MedicineRepository($bd);
        $rep->create(\Model\Medicine::fromAssocArray($_GET));
        header("Location: /db_app/medicines");
    }else if($route[3] == "patient"){
        $rep = new \Repository\PatientRepository($bd);
        $rep->create(\Model\Patient::fromAssocArray($_GET));
        if(isset($_GET['medicine_id']))foreach($_GET['medicine_id'] as $med_id)$rep->addMedicine($_GET["id"],$med_id);
        header("Location: /db_app/patients");
    }else if($route[3] == "patient_reception"){
        $rep = new \Repository\PatientReceptionRepository($bd);
        if(isset($_GET['appeal_id']))foreach($_GET['appeal_id'] as $app_id)$rep->addAppeal($app_id,$_GET["id"]);
        $rep->create(\Model\PatientReception::fromAssocArray($_GET));
        header("Location: /db_app/patient_receptions");
    }else if($route[3] == "registrar"){
        $rep = new \Repository\RegistrarRepository($bd);
        $rep->create(\Model\Registrar::fromAssocArray($_GET));
        header("Location: /db_app/registrar");
    }else if($route[3] == "sale"){
        $rep = new \Repository\SaleRepository($bd);
        $rep->create(\Model\Sale::fromAssocArray($_GET));
        if(isset($_GET['service_id']))foreach($_GET['service_id'] as $serv_id)$rep->addService($_GET["id"],$serv_id);
        header("Location: /db_app/sales");
    }else if($route[3] == "service"){
        $rep = new \Repository\ServiceRepository($bd);
        $rep->create(\Model\Service::fromAssocArray($_GET));
        header("Location: /db_app/services");
    }else if($route[3] == "user"){
        $rep = new \Repository\UserRepository($bd);
        $rep->create(\Model\User::fromAssocArray($_GET));
        header("Location: /db_app/users");
    }else if($route[3] == "user_role"){
        $rep = new \Repository\UserRoleRepository($bd);
        $rep->create(\Model\UserRole::fromAssocArray($_GET));
        header("Location: /db_app/user_roles");
    }
}

$bd->close();


?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous"></script>

</body>
</html>
