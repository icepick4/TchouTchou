<?php


//Check droit 
require_once(PATH_MODELS . 'StaffDAO.php');
$staff = new StaffDAO();


if (isset($_SESSION['user_id']) && ($staff->isStation($_SESSION['user_id']) || $staff->isAdministrator($_SESSION['user_id']))) {

	// open and close plat
	if (
		isset($_GET["station_id"]) && isset($_GET["hub_id"]) && isset($_GET["plat_letter"])
		&& isset($_GET["plat_status"])
	) {
		require_once(PATH_MODELS . 'StationDAO.php');
		$station = new StationDAO();

		if ($_GET["plat_status"] == "1") {
			$res = $station->set_platform_status_open(
				$_GET["station_id"],
				$_GET["hub_id"],
				$_GET["plat_letter"]
			);
			echo "1";
		} else {
			$res = $station->set_platform_status_close(
				$_GET["station_id"],
				$_GET["hub_id"],
				$_GET["plat_letter"]
			);
			echo "0";
		}

		return;
	} else {
		//load web page
		require_once(PATH_MODELS . 'StationDAO.php');

		$train = new StationDAO();

		$stations = $train->get_stations();

		require_once(PATH_VIEWS . $page . '.php');
	}
} else {
	header("Location: index.php?page=home");
	die();
}
