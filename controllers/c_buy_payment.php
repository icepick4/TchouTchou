<?php

require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'StationDAO.php');
//si le paiment est validé, on ajoute un billet à la base de données
$station = new StationDAO();
$from_station_name = $station->get_station_name($_POST['from'])['STATION_NAME'];
$from_station_time_departure = $station->get_station_departure_for_travel($_POST['travel'],$_POST['from'])['DEPARTURE_TIME'];
$to_station_name = $station->get_station_name($_POST['to'])['STATION_NAME'];
$to_station_time_arrival = $station->get_station_arrival_for_travel($_POST['travel'],$_POST['to'])['ARRIVAL_TIME'];
$from_station_date_departure = $station->get_station_departure_date_for_travel($_POST['travel'],$_POST['from'])['DEPARTURE_DATE'];
if (isset($_GET['payment'])) {
    $travel_id = $_GET['travel'];
    $from_id = $_GET['from'];
    $to_id = $_GET['to'];
    $user_id = $_SESSION['user_id'];
    $user = new UserDAO();
    $user->addTicket($user_id, $travel_id, $from_id, $to_id, $place, $_SESSION['first_name'], $_SESSION['last_name']);
    
}

require_once(PATH_VIEWS . $page . '.php');