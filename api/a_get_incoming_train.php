<?php
if(isset($_GET["station_id"]) && isset($_GET["incoming"]) ){
		require_once(PATH_MODELS . 'StationDAO.php');
		$station = new StationDAO();
		$stations = $station->get_station_arrivals_with_platform($_GET["station_id"], 1/48);
		$station_infos = array();
		$station_infos["incoming"] = array();
		for ($i = 0; $i < count($stations); $i++) {
			$station_infos["incoming"][$i] = $stations[$i];
		}
		echo json_encode($station_infos);