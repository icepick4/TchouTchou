<?php


//Check droit 
require_once(PATH_MODELS . 'StaffDAO.php');
$staff = new StaffDAO();

// a finir, droit pas effectuer

if (isset($_SESSION['user_id'])  || $staff->isAdministrator($_SESSION['user_id'])) {


		require_once(PATH_VIEWS . $page . '.php');
	
} else {
	header("Location: index.php?page=home");
	die();
}
