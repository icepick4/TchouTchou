<?php

require_once(PATH_MODELS.'AlertDAO.php');

$alerts = new AlertDAO();

if(isset($_GET['showAll'])){
    $alertList = $alerts->getAllAlerts();
    $alertTypeList = $alerts->getAllAlertsType();
}else{
    $alertList = $alerts->getAllCurrentAlerts();
    $alertTypeList = $alerts->getAllCurrentAlertsType();
}


require_once(PATH_VIEWS.$page.'.php');
