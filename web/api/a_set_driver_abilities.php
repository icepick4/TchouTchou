<?php
require_once(PATH_MODELS . 'StaffDAO.php');
$staff = new StaffDAO();
if ($_SESSION['logged'] && ($staff->isAdministrator($_SESSION['user_id']) || $staff->isHumanResource($_SESSION['user_id'])) && isset($_GET["ABILITIES"])
	&& isset($_SESSION["driver_id"])
	)
{
	$driver_id = $_SESSION["driver_id"];
	foreach ($_GET['ABILITIES'] as $key => $value) {
		//echo $driver_id, $key, $value;
		$staff->setDriverAbility($driver_id,$key,$value );
	}
print_r($_GET['ABILITIES']);

print($_SESSION["driver_id"]);
}