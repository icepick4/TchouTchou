<?php
require_once(PATH_MODELS . 'StaffDAO.php');

$staff = new StaffDAO();
$user = new UserDAO();



if ($_SESSION['logged'] && ($staff->isAdministrator($_SESSION['user_id']) || $staff->isHumanResource($_SESSION['user_id'])) && isset($_GET["user_id"])) {


        $driver_id = $staff->getDriverID($_GET["user_id"]);
        $_SESSION['driver_id'] = $driver_id;
        $driver_name = $user->getUserById($_GET["user_id"])['USER_LASTNAME'];

        $driver_abilities = $staff->getDriverAbility($driver_id);

 

	    require_once(PATH_VIEWS . $page . '.php');
} else {
    header("Location: index.php?page=home");
    die();
}