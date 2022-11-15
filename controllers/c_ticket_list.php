<?php
require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'TrainDAO.php');


if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {
    $user = new UserDAO(true);
    $train = new TrainDAO(true);
    $tickets = $user->getTickets($_SESSION['user_id']);
    $stations = $train->getStations();
    //get stations names
    for ($i = 0; $i < count($tickets); $i++) {
        for ($j = 0; $j < count($stations); $j++) {
            if ($tickets[$i]['START_STATION_ID'] == $stations[$j]['STATION_ID']) {
                $tickets[$i]['START_STATION_ID'] = $stations[$j]['STATION_NAME'];
            }
            if ($tickets[$i]['END_STATION_ID'] == $stations[$j]['STATION_ID']) {
                $tickets[$i]['END_STATION_ID'] = $stations[$j]['STATION_NAME'];
            }
        }
    }
}

require_once(PATH_VIEWS . $page . '.php');
