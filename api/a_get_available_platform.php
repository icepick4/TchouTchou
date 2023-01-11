<?php
if(isset($_GET["station_id"]) && isset($_GET["hub_id"]) &&  isset($_GET["incoming"]) ){
		require_once(PATH_MODELS . 'StationDAO.php');
		$station = new StationDAO();
		$stations = $station->get_available_platform($_GET["station_id"], $_GET["hub_id"]);
		$station_infos = array();
		$station_infos["available_platform"] = array();
		for ($i = 0; $i < count($stations); $i++) {
			$station_infos["available_platform"][$i] = $stations[$i]["PLATFORM_LETTER"];
		}
		echo json_encode($station_infos);

	}