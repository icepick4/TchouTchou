<?php
if (isset($_GET["station_name"])){
	require_once(PATH_MODELS . 'StationDAO.php');
	$station = new StationDAO();
	$stations = $station->get_hubs($_GET["station_name"]);
	echo json_encode('{"hub": '.'["1","2"]'.'}');
}else{

require_once(PATH_MODELS . 'TrainDAO.php');

$train = new TrainDAO();

$stations = $train->get_stations();

require_once(PATH_VIEWS . $page . '.php');

}