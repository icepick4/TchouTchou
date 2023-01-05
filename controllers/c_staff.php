<?php
require_once(PATH_MODELS . 'StaffDAO.php');
require_once(PATH_MODELS . 'UserDAO.php');
$staff = new StaffDAO();
$user = new UserDAO();

$user_list_not_employees = $user->getAllClient();
$staff_list = $staff->getAllStaff();
$staff_type = $staff->getAllStaffType();
if ($_SESSION['logged'] && $user->isAdministrator($_SESSION['user_id'])) {

} else {
    header("Location: index.php?page=home");
    die();
}

require_once(PATH_VIEWS . $page . '.php');
