<?php

require_once(PATH_MODELS . 'StationDAO.php');
require_once(PATH_MODELS . 'TrainDAO.php');

$station = new StationDAO();
$train = new TrainDAO();
$stations = $station->get_stations();

if (isset($_POST['date']) and isset($_POST['from']) and isset($_POST['to'])) {
    $date = $_POST['date'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $trains = $train->get_trains_on($date, $from, $to);
    $trains_infos = array();
}
require_once(PATH_VIEWS . $page . '.php');
