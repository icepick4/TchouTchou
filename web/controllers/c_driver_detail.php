<?php
require_once(PATH_MODELS . 'StaffDAO.php');

$staff = new StaffDAO();



if ($_SESSION['logged'] && ($staff->isAdministrator($_SESSION['user_id']) || $staff->isHumanResource($_SESSION['user_id']))) {

	    require_once(PATH_VIEWS . $page . '.php');
} else {
    header("Location: index.php?page=home");
    die();
}