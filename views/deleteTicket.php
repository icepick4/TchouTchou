<!DOCTYPE html>
<html>

<body>
    
    <?php
    chdir("../");
    //pour utiliser le fichier de config de base
    $skipSession = true;
    require_once('./config/configuration.php');
    require_once(PATH_MODELS . 'UserDAO.php');
    $user = new UserDAO();
    $user->deleteTicket($_SESSION['id'],$_GET['ticket']);