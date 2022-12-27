<?php

require_once(PATH_MODELS.'AlertDAO.php');
require_once(PATH_MODELS.'PlanningDAO.php');
require_once(PATH_MODELS.'UserDAO.php');



if(isset($_POST['alertType']) && isset($_POST['message']) && isset($_POST['infoposition'])){
   
    $planning = new PlanningDAO();
    $user = new UserDAO();
    $alerts = new AlertDAO();

    $driver = $user->getDriverID($_SESSION['user_id']);
    $travel = $planning->getDriverTravelForTheDayByHour($driver, $date('H'));

    $alerts= $alerts->createAlert($travel[0]['TRAVEL_ID'], $_POST['alertType'], $_POST['message'], $_POST['infoposition']);
    $alert = choixAlert('alert_created');

}

require_once(PATH_VIEWS.$page.'.php');
