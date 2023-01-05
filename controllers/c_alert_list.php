<?php
require_once(PATH_MODELS.'AlertDAO.php');
require_once(PATH_MODELS.'UserDAO.php');
$user = new UserDAO();
if ($_SESSION['logged'] && $user->isService($_SESSION['user_id']) || $user->isStation($_SESSION['user_id'])) {


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
