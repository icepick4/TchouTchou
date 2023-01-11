<?php
require_once(PATH_MODELS . 'StaffDAO.php');
require_once(PATH_MODELS . 'CustomerDAO.php');
$staff = new StaffDAO();
$customer = new CustomerDAO();


if ($_SESSION['logged'] && ($staff->isAdministrator($_SESSION['user_id']) || $staff->isHumanResource($_SESSION['user_id']))) {
    if (isset($_POST['user_identity_create']) && isset($_POST['staff_type_create'])) {
        if ($_POST['staff_type_create'] != 1 || ($_POST['staff_type_create'] == 1 && $staff->isAdministrator($_SESSION['user_id']))) {
            $user_identity_create = $_POST['user_identity_create'];
            $staff_type_create = $_POST['staff_type_create'];
            $staff->addEmployee($user_identity_create, $staff_type_create);
            $staff->setUserType($user_identity_create, 1);
            header("Location: index.php?page=staff");
        }
    }

    if (isset($_POST['staff_type_update']) && isset($_POST['user_identity_update'])) {
        if (
            ($_POST['staff_type_update'] != 1 && !$staff->isAdministrator($_POST['user_identity_update'])) 
            || 
            ($_POST['staff_type_update'] == 1 && $staff->isAdministrator($_SESSION['user_id']))
            || 
            ($staff->isAdministrator($_POST['user_identity_update']) && $staff->isAdministrator($_SESSION['user_id']))) {
            $staff_type_update = $_POST['staff_type_update'];
            $user_identity_update = $_POST['user_identity_update'];
            $staff->setEmployeeType($user_identity_update, $staff_type_update);
            header("Location: index.php?page=staff");
        } else {
            header("Refresh:0");
        }
    }
    $user_list_not_employees = $customer->getAllCustomers();
    $staff_list = $staff->getAllStaff();
    $staff_type = $staff->getAllStaffType();
    require_once(PATH_VIEWS . $page . '.php');
} else {
    header("Location: index.php?page=home");
    die();
}

