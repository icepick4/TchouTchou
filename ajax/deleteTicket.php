<!DOCTYPE html>
<html>

<body>
    
    <?php
    chdir("../");
    //pour utiliser le fichier de config de base
    $skipSession = true;
    require_once('./config/configuration.php');
    require_once(PATH_MODELS . 'TicketDAO.php');
    $ticket = new TicketDAO();
    $ticket->deleteTicket($_GET['id'],$_GET['ticket']);