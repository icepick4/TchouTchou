<?php
require_once(PATH_MODELS . 'TicketDAO.php');
require_once(PATH_MODELS . 'StationDAO.php');


if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {
    $ticket = new TicketDAO();
    $tickets = $ticket->getTicketsById($_SESSION['user_id']);
}

require_once(PATH_VIEWS . $page . '.php');
