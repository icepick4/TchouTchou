<?php


//Check droit 
require_once(PATH_MODELS . 'StaffDAO.php');
$staff = new StaffDAO();


if (isset($_SESSION['user_id']) && ($staff->isStation($_SESSION['user_id']) || $staff->isAdministrator($_SESSION['user_id']))) {



		//load web page
		require_once(PATH_MODELS . 'StationDAO.php');
		require_once(PATH_MODELS . 'StaffDAO.php');

		$staff = new StaffDAO();

		$user_station = $staff->getEmployeeStation($_SESSION['user_id']);
	 	
	 	if (count($user_station) > 0 && count($user_station["STATION_ATTACH"]) > 0){
	 		
	 		$_SESSION['STATION_ATTACH'] = $user_station["STATION_ATTACH"];
	 		//print_r($stations[$_SESSION['STATION_ATTACH']]);

	 		$station = new StationDAO();

			$stations = $station->get_station($_SESSION['STATION_ATTACH']);


	 	}else{
	 		$station = new StationDAO();

			$stations = $station->get_stations();

	 	}

		

		
		

		require_once(PATH_VIEWS . $page . '.php');
	
} else {
	header("Location: index.php?page=home");
	die();
}
