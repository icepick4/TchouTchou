<!DOCTYPE html>
<html>

<body>
    
    <?php
    chdir("../");
    //pour utiliser le fichier de config de base
    $skipSession = true;
    require_once('./config/configuration.php');
    require_once(PATH_MODELS . 'AlertDAO.php');

    //ici tu met le php que tu veux avec le dao et la requete dessus qui va s'executer
    $alert = new AlertDAO();

    $id_alert = $_GET['id'];

    $alert->updateAlertStatus(substr($_GET['id'], 0, sizeof($_GET['id']) - 6), substr($_GET['id'], -6, 2), substr($_GET['id'], -4, 2), substr($_GET['id'], -2, 2), 0);

