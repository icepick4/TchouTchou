<?php

require_once(PATH_MODELS.'AlertDAO.php');

$alerts = new AlertDAO();

$alertList = $alerts->getAllAlerts();
$alertList = $alertList[0];

$coord = $alertList['ALERT_LOCATION'];
$coord = explode('//', $coord);

$logo = choixImage($alertList['ALERT_TYPE_ID']);

require_once(PATH_VIEWS.$page.'.php');
