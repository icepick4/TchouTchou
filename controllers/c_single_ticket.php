<?php

require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'TrainDAO.php');

if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {
    $user = new UserDAO(true);
    $ticket = $user->getTicketById($_GET['ticket'], $_SESSION['user_id']);
    $date = new DateTime($ticket['TRAVEL_DATETIME']);
    $date = $date->format('d/m/Y');
}

require_once(PATH_VIEWS . $page . '.php');
