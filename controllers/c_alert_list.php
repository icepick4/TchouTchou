<?php

require_once(PATH_MODELS.'AlertDAO.php');

$alerts = new AlertDAO();

$alertList = $alerts->getAllCurrentAlerts();
$alertTypeList = $alerts->getAllCurrentAlertsType();



require_once(PATH_VIEWS.$page.'.php');
