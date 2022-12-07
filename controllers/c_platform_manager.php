<?php
if (isset($_GET["station_name"])) {
	require_once(PATH_MODELS . 'StationDAO.php');
	$station = new StationDAO();
	$stations = $station->get_hubs($_GET["station_name"]);
	$station_infos = array();
	for ($i = 0; $i < count($stations); $i++) {
		$station_infos["hub"][$i] = $stations[$i]["TERMINAL_ID"];
	}
	echo json_encode($station_infos);
} else {

	require_once(PATH_MODELS . 'TrainDAO.php');

	$train = new TrainDAO();

	$stations = $train->get_stations();

	require_once(PATH_VIEWS . $page . '.php');
}
