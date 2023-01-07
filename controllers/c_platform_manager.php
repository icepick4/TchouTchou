<?php


//Check droit 
require_once(PATH_MODELS . 'StaffDAO.php');
$staff = new StaffDAO();


if (isset($_SESSION['user_id']) && ($staff->isStation($_SESSION['user_id']) || $staff->isAdministrator($_SESSION['user_id']))) {

	if (isset($_GET["station_id"]) && isset($_GET["hub_id"]) && isset($_GET["plat_letter"]) 
		&& isset($_GET["plat_status"])) {
		require_once(PATH_MODELS . 'StationDAO.php');
		$station = new StationDAO();

		if ($_GET["plat_status"] == "1"){
			$res = $station->set_platform_status_open(
				$_GET["station_id"],$_GET["hub_id"],$_GET["plat_letter"]);
				echo "1";
		}else{
			$res = $station->set_platform_status_close(
				$_GET["station_id"],$_GET["hub_id"],$_GET["plat_letter"]);
				echo "0";
		}

		return;



	}
	else if(isset($_GET["station_id"]) && isset($_GET["hub_id"]) &&  isset($_GET["incoming"]) ){
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
	else if (isset($_GET["station_id"]) && isset($_GET["hub_id"])) {
		require_once(PATH_MODELS . 'StationDAO.php');
		$station = new StationDAO();
		$stations = $station->get_platforms($_GET["station_id"],$_GET["hub_id"]);
		$station_infos = array();
		for ($i = 0; $i < count($stations); $i++) {
			$station_infos["platforms"][$i] = $stations[$i];
		}
		echo json_encode($station_infos);

	}
	else if(isset($_GET["station_id"]) && isset($_GET["incoming"]) ){
		require_once(PATH_MODELS . 'StationDAO.php');
		$station = new StationDAO();
		$stations = $station->get_station_arrivals_with_platform($_GET["station_id"], 1/48);
		$station_infos = array();
		$station_infos["incoming"] = array();
		for ($i = 0; $i < count($stations); $i++) {
			$station_infos["incoming"][$i] = $stations[$i];
		}
		echo json_encode($station_infos);

	}
	else if (isset($_GET["station_id"])) {
		require_once(PATH_MODELS . 'StationDAO.php');
		$station = new StationDAO();
		$stations = $station->get_hubs($_GET["station_id"]);
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

} else {
	header("Location: index.php?page=home");
	die();
}


