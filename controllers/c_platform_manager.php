<?php

if (isset($_GET["station_name"]) && isset($_GET["hub_id"])) {
	require_once(PATH_MODELS . 'StationDAO.php');
	$station = new StationDAO();
	$stations = $station->get_platforms($_GET["station_name"],$_GET["hub_id"]);
	$station_infos = array();
	for ($i = 0; $i < count($stations); $i++) {
		$station_infos["platforms"][$i] = $stations[$i];
	}
	echo json_encode($station_infos);

}
else if (isset($_GET["station_name"])) {
	require_once(PATH_MODELS . 'StationDAO.php');
	$station = new StationDAO();
	$stations = $station->get_hubs($_GET["station_name"]);
	$station_infos = array();
	for ($i = 0; $i < count($stations); $i++) {
		$station_infos["hub"][$i] = $stations[$i]["TERMINAL_ID"];
	}
	echo json_encode($station_infos);
} else {

	require_once(PATH_MODELS . 'StationDAO.php');

	$train = new StationDAO();

	$stations = $train->get_stations();

	require_once(PATH_VIEWS . $page . '.php');
}
