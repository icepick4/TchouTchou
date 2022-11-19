<?php

require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_LIB . 'foncBase.php');

if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {
    $user = new UserDAO(true);
    $ticket = $user->getTicketById($_GET['ticket'], $_SESSION['user_id']);
    $date = new DateTime($ticket['TRAVEL_DATETIME']);
    $date = $date->format('d/m/Y');
    $start_hour = $ticket['START_TIME_HOUR'] * 60;
    $start_minute = $ticket['START_TIME_MINUTE'];
    $end_hour = $ticket['END_TIME_HOUR'] * 60;
    $end_minute = $ticket['END_TIME_MINUTE'];
    $ticket['DURATION'] = getTime(($end_hour + $end_minute) - ($start_hour + $start_minute));
}

require_once(PATH_VIEWS . $page . '.php');
