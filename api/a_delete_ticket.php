<!DOCTYPE html>
<html>

<body>
    
    <?php
    
    require_once(PATH_MODELS . 'TicketDAO.php');
    $ticket = new TicketDAO();
    $ticket->deleteTicket($_GET['id'],$_GET['ticket']);