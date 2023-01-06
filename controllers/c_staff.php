<?php
require_once(PATH_MODELS . 'StaffDAO.php');
require_once(PATH_MODELS . 'UserDAO.php');
$staff = new StaffDAO();
$user = new UserDAO();


if ($_SESSION['logged'] && ($staff->isAdministrator($_SESSION['user_id']) || $staff->isHumanResource($_SESSION['user_id']))) {
    if (isset($_POST['user_identity_create']) && isset($_POST['staff_type_create'])) {
        $user_identity_create = $_POST['user_identity_create'];
        $staff_type_create = $_POST['staff_type_create'];
        $staff->addEmployee($user_identity_create,$staff_type_create);
        $user->setUserType($user_identity_create, 1);
        header("Location: index.php?page=staff");
    }

    if (isset($_POST['staff_type_update']) && isset($_POST['user_identity_update'])) {
        $staff_type_update = $_POST['staff_type_update'];
        $user_identity_update = $_POST['user_identity_update'];
        $staff->setEmployeeType($user_identity_update,$staff_type_update);
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

