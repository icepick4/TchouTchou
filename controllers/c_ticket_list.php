<?php
require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'TrainDAO.php');


if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {
    $user = new UserDAO(true);
    $train = new TrainDAO(true);
    $tickets = $user->getTickets($_SESSION['user_id']);
    $stations = $train->getStations();
    $tickets = $train->getInfosTicket($tickets, $stations);
}

require_once(PATH_VIEWS . $page . '.php');
