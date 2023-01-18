<?php
require_once(PATH_MODELS . 'StaffDAO.php');
require_once(PATH_MODELS . 'StationDAO.php');
require_once(PATH_MODELS . 'TravelDAO.php');

$staff = new StaffDAO();
$station = new StationDAO();
$travel = new TravelDAO();

if ($staff->isAdministrator($_SESSION['user_id'])) {

    if(isset($_GET['from']) && isset($_GET['to'])) {
        $from = $_GET['from'];
        $to = $_GET['to'];
        $lines = $trabbel->getLineBetweenTwoPoints($from, $to);
        
    }
    $stations = $station->get_stations();
    require_once(PATH_VIEWS . $page . '.php');

} else {
    header("Location: index.php?page=home");
    die();
}



