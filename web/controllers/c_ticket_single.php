<?php

require_once(PATH_MODELS . 'TicketDAO.php');
require_once(PATH_LIB . 'foncBase.php');
require_once(PATH_MODELS . 'StaffDAO.php');
$user = new StaffDAO();

if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else if (!isset($_GET['ticket'])){
    header("Location: index.php?page=ticket_list");
    die();
}

if($user->isStation($_SESSION['user_id'])){
    header('Location: index.php?page=home');
    exit();
}

$tickets = new TicketDAO();
$ticket = $tickets->getTicketById($_GET['ticket'], $_SESSION['user_id']);


require_once(PATH_VIEWS . $page . '.php');
