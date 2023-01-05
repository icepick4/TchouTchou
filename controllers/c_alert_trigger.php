<?php

require_once(PATH_MODELS.'AlertDAO.php');
require_once(PATH_MODELS.'PlanningDAO.php');
require_once(PATH_MODELS.'StaffDAO.php');
$staff = new StaffDAO();
if ($_SESSION['logged'] && $staff->isDriver($_SESSION['user_id'])) {
    if(isset($_POST['alertType']) && isset($_POST['message']) && isset($_POST['infoposition'])){
   
        $planning = new PlanningDAO();
        $alerts = new AlertDAO();
    
        $driver = $staff->getDriverID($_SESSION['user_id']);
        //remplacer 22 par l'heure actuelle
        $travel = $planning->getDriverTravelForTheDayByHour($driver, 22);
    
        $alerts->createAlert($travel[0]['TRAVEL_ID'], $_POST['alertType'], $_POST['message'], $_POST['infoposition']);
        $alert = choixAlert('alert_created');
    }
} else {
    header("Location: index.php?page=home");
    die();
}



require_once(PATH_VIEWS.$page.'.php');
