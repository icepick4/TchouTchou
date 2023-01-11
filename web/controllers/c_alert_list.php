<?php
require_once(PATH_MODELS.'AlertDAO.php');
require_once(PATH_MODELS.'StaffDAO.php');
$staff = new StaffDAO();
if ($_SESSION['logged'] && $staff->isService($_SESSION['user_id']) || $staff->isStation($_SESSION['user_id']) || $staff->isAdministrator($_SESSION['user_id'])) {


    $alerts = new AlertDAO();

    if(isset($_GET['showAll'])){
        $alertList = $alerts->getAllAlerts();
        $alertTypeList = $alerts->getAllAlertsType();
    }else{
        $alertList = $alerts->getAllCurrentAlerts();
        $alertTypeList = $alerts->getAllCurrentAlertsType();
    }
} else {
    header("Location: index.php?page=home");
    die();
}

require_once(PATH_VIEWS.$page.'.php');
