<?php
require_once(PATH_MODELS.'AlertDAO.php');
require_once(PATH_MODELS.'UserDAO.php');
$user = new UserDAO();
if ($_SESSION['logged'] && $user->isService($_SESSION['user_id'])) {
    

    $alerts = new AlertDAO();
    $alert = $alerts->getAlertByDetail(substr($_GET['id'],0,sizeof($_GET['id'])-6),substr($_GET['id'],-6,2),substr($_GET['id'],-4,2),substr($_GET['id'],-2,2));

    $coord = $alert['ALERT_LOCATION'];
    $coord = explode('//', $coord);

    $logo = choixImage($alert['ALERT_TYPE_ID']);
} else {
    header("Location: index.php?page=home");
    die();
}

require_once(PATH_VIEWS.$page.'.php');

