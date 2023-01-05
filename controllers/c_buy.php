<?php

require_once(PATH_MODELS . 'StationDAO.php');
require_once(PATH_MODELS . 'TrainDAO.php');
require_once(PATH_MODELS . 'TravelDAO.php');

$station = new StationDAO();
$train = new TrainDAO();
$travel = new TravelDAO();
$stations = $station->get_stations();
$trains = array();
if (isset($_POST['date']) and isset($_POST['from']) and isset($_POST['to']) and !empty($_POST['date'])) {
    $date = $_POST['date'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    for ($i = 0; $i < count($stations); $i++) {
        if ($stations[$i]['STATION_NAME'] == $from) {
            $from_id = $stations[$i]['STATION_ID'];
        }
        if ($stations[$i]['STATION_NAME'] == $to) {
            $to_id = $stations[$i]['STATION_ID'];
        }
    }
    $trains = $travel->getTravelsOn($date, $from_id, $to_id);
    for ($i = 0; $i < count($trains); $i++) {
        $trains[$i]['DURATION'] = minToHourMin($trains[$i]['DURATION']);
        $trains[$i]['EMPTY_SEATS'] = $travel->getEmptySeats($trains[$i]['TRAVEL_ID'], $trains[$i]['LINE_ID'], $trains[$i]['START_STATION_ID'], $trains[$i]['END_STATION_ID']);
        if($trains[$i]['TRAIN_TYPE_ID'] < 4){
            $trains[$i]['TRAIN_TYPE_LABEL'] = "TER";
        }else {
            $trains[$i]['TRAIN_TYPE_LABEL'] = "TGV";
        }
    }
} 
require_once(PATH_VIEWS . $page . '.php');
