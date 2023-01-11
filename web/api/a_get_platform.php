<?php
if (isset($_GET["station_id"]) && isset($_GET["hub_id"])) {
	require_once(PATH_MODELS . 'StationDAO.php');
	$station = new StationDAO();
	$stations = $station->get_platforms($_GET["station_id"], $_GET["hub_id"]);
	$station_infos = array();
	for ($i = 0; $i < count($stations); $i++) {
		$station_infos["platforms"][$i] = $stations[$i];
	}
	echo json_encode($station_infos);
}
