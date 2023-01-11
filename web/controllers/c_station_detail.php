<?php

require_once(PATH_MODELS . 'StationDAO.php');
require_once(PATH_MODELS . 'TravelDAO.php');

$train = new StationDAO();
$travel = new TravelDAO();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$station_name = $train->get_station_name($_GET['id']);
$departTravels = $train->get_station_departure($_GET['id']);
$arrivalTravels = $train->get_station_arrivals($_GET['id']);
require_once(PATH_VIEWS . $page . '.php');
