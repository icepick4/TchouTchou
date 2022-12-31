<?php

//Check droit 
require_once(PATH_MODELS . 'UserDAO.php');
$user = new UserDAO();


if (!isset($_SESSION['user_id']) || ( isset($_SESSION['user_id']) && !$user->isStation($_SESSION['user_id']) )) {
	header("Location: index.php");
}

if (isset($_GET["station_name"]) && isset($_GET["hub_id"]) && isset($_GET["plat_letter"]) 
	&& isset($_GET["plat_status"])) {
	require_once(PATH_MODELS . 'StationDAO.php');
	$station = new StationDAO();

	if ($_GET["plat_status"] == "1"){
		$res = $station->set_platform_status_open(
			$_GET["station_name"],$_GET["hub_id"],$_GET["plat_letter"]);
			echo "1";
	}else{
		$res = $station->set_platform_status_close(
			$_GET["station_name"],$_GET["hub_id"],$_GET["plat_letter"]);
			echo "0";
	}

	return;



}
else if (isset($_GET["station_name"]) && isset($_GET["hub_id"])) {
	require_once(PATH_MODELS . 'StationDAO.php');
	$station = new StationDAO();
	$stations = $station->get_platforms($_GET["station_name"],$_GET["hub_id"]);
	$station_infos = array();
	for ($i = 0; $i < count($stations); $i++) {
		$station_infos["platforms"][$i] = $stations[$i];
	}
	echo json_encode($station_infos);

}
else if(isset($_GET["station_name"]) && isset($_GET["incoming"]) ){
	require_once(PATH_MODELS . 'StationDAO.php');
	$station = new StationDAO();
	$stations = $station->get_station_arrivals_days($_GET["station_name"], 1/24/2);
	$station_infos = array();
	for ($i = 0; $i < count($stations); $i++) {
		$station_infos["incoming"][$i] = $stations[$i];
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
