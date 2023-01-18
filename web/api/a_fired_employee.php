<?php
    
    require_once(PATH_MODELS . 'StaffDAO.php');
    require_once(PATH_MODELS . 'UserDAO.php');
    $staff = new StaffDAO();

if (($staff->isHumanResource(intval($_SESSION['user_id'])) && !$staff->isAdministrator($_GET['user_id'])) || $staff->isAdministrator(intval($_SESSION['user_id']))) {
        $user = new UserDAO();
        if ($staff->isDriver(intval($_GET['user_id']))) {
            if ($staff->getNbrDriverTravelPlanned(intval($_GET['user_id'])) > 0) {
                //header("Location: index.php?page=staff");
                die();
            }
        }
        $staff->firedEmployee(intval($_GET['user_id']));
        $user->setUserType(intval($_GET['user_id']), 0);
        echo "finsh";
}