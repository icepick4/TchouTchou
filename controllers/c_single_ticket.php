<?php

require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'TrainDAO.php');

if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {
    $train = new TrainDAO(true);
    $user = new UserDAO(true);
    $ticket = $user->getTicketById($_GET['ticket'], $_SESSION['user_id']);
    $ticket = $train->getSingleTicketInfos($ticket);
}

require_once(PATH_VIEWS . $page . '.php');
