<?php
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
}
