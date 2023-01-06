<!DOCTYPE html>
<html>

<body>

    <?php
    chdir("../");
    //pour utiliser le fichier de config de base
    $skipSession = true;
    require_once('./config/configuration.php');
    require_once(PATH_TEXTES . LANG . '.php');
    require_once(PATH_MODELS . 'StaffDAO.php');
    require_once(PATH_MODELS . 'UserDAO.php');
    $staff = new StaffDAO();

    if ($staff->isHumanResource(intval($_GET['user_id'])) || $staff->isAdministrator(intval($_GET['user_id'])))
        {

        $user = new UserDAO();
        $staff->firedEmployee(intval($_GET['id']));
        $user->setUserType(intval($_GET['id']), 0);
        } else
        { 
        header("Location: index.php?page=staff");
        die();
        }