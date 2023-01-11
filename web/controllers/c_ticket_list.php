<?php
require_once(PATH_MODELS . 'TicketDAO.php');
require_once(PATH_MODELS . 'StationDAO.php');

require_once(PATH_MODELS . 'StaffDAO.php');
$user = new StaffDAO();


if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
}


if($user->isStation($_SESSION['user_id'])){
    header('Location: index.php?page=home');
    exit();
}


$ticket = new TicketDAO();
$tickets = $ticket->getTicketsById($_SESSION['user_id']);


require_once(PATH_VIEWS . $page . '.php');
