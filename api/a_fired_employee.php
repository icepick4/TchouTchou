<!DOCTYPE html>
<html>

<body>

    <?php
    
    require_once(PATH_MODELS . 'StaffDAO.php');
    require_once(PATH_MODELS . 'UserDAO.php');
    $staff = new StaffDAO();

    if ($staff->isHumanResource(intval($_GET['user_id'])) || $staff->isAdministrator(intval($_GET['user_id']))) {

        $user = new UserDAO();
        if ($staff->isDriver(intval($_GET['id']))) {
            if ($staff->getNbrDriverTravelPlanned(intval($_GET['id'])) > 0) {
                header("Location: index.php?page=staff");
                die();
            }
        }
        $staff->firedEmployee(intval($_GET['id']));
        $user->setUserType(intval($_GET['id']), 0);
    } else {
        header("Location: index.php?page=staff");
        die();
    }
