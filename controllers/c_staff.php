<?php
require_once(PATH_MODELS . 'StaffDAO.php');
require_once(PATH_MODELS . 'UserDAO.php');
$staff = new StaffDAO();
$user = new UserDAO();


if ($_SESSION['logged'] && ($staff->isAdministrator($_SESSION['user_id']) || $staff->isHumanResource($_SESSION['user_id']))) {
    if (isset($_POST['user_identity']) && isset($_POST['staff_type'])) {
        $user_identity = $_POST['user_identity'];
        $staff_type = $_POST['staff_type'];
        $staff->addEmployee($user_identity,$staff_type);
        header("Location: index.php?page=staff");
    }
    $user_list_not_employees = $user->getAllClient();
    $staff_list = $staff->getAllStaff();
    $staff_type = $staff->getAllStaffType();
    require_once(PATH_VIEWS . $page . '.php');
} else {
    header("Location: index.php?page=home");
    die();
}

