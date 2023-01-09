<?php


//Check droit 
require_once(PATH_MODELS . 'StaffDAO.php');
$staff = new StaffDAO();


if (isset($_SESSION['user_id']) && ($staff->isStation($_SESSION['user_id']) || $staff->isAdministrator($_SESSION['user_id']))) {


	 if(isset($_GET["station_id"]) && isset($_GET["hub_id"])
	 && isset($_GET["train_id"]) && isset($_GET["platform_letter"]) ){
	 	
		require_once(PATH_MODELS . 'StationDAO.php');
		$station = new StationDAO();

		$stations = $station->clear_platform_of_user(
			$_GET["station_id"],$_GET["hub_id"],
        $_GET["train_id"]);

        $stations = $station->set_platform_user($_GET["station_id"],$_GET["hub_id"],
        $_GET["platform_letter"],$_GET["train_id"]);

	}

} else {
	header("Location: index.php?page=home");
	die();
}

