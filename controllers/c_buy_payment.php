<?php

$price = intval($_POST['price']);
$nbr = intval($_POST['nbr']);

$travel = $_POST['travel'];
$line = $_POST['line'];
$from = $_POST['from'];
$to = $_POST['to'];
if(isset($_POST['seat'])){
    $seat = $_POST['seat'];
}else{$seat== -1;}
$name = $_POST['name_1'];
$firstname = $_POST['firstname_1'];
for($i = 2; $i <= $nbr; $i++){
    $buffer = 'name_' . $i;
    $name .= "//" . $_POST[$buffer];
    $buffer = 'firstname_' .$i;
    $firstname .= "//" . $_POST[$buffer];
}


require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'StationDAO.php');

$station = new StationDAO();
$from_station_name = $station->get_station_name($_POST['from'])['STATION_NAME'];
$from_station_time_departure = $station->get_station_departure_for_travel($_POST['travel'],$_POST['from'])['DEPARTURE_TIME'];
$to_station_name = $station->get_station_name($_POST['to'])['STATION_NAME'];
$to_station_time_arrival = $station->get_station_arrival_for_travel($_POST['travel'],$_POST['to'])['ARRIVAL_TIME'];
$from_station_date_departure = $station->get_station_departure_date_for_travel($_POST['travel'],$_POST['from'])['DEPARTURE_DATE'];

require_once(PATH_VIEWS . $page . '.php');