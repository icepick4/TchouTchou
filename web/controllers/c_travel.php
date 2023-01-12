<?php
require_once(PATH_MODELS . 'StaffDAO.php');
require_once(PATH_MODELS . 'StationDAO.php');

$staff = new StaffDAO();
$station = new StationDAO();

if ($staff->isAdministrator($_SESSION['user_id'])) {
    $stations = $station->get_stations();
    require_once(PATH_VIEWS . $page . '.php');
} else {
    header("Location: index.php?page=home");
    die();
}



