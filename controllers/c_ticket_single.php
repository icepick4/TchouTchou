<?php

require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_LIB . 'foncBase.php');

if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else if (!isset($_GET['ticket'])){
    header("Location: index.php?page=ticket_list");
    die();
} else{
    $user = new UserDAO(true);
    $ticket = $user->getTicketById($_GET['ticket'], $_SESSION['user_id']);
}

require_once(PATH_VIEWS . $page . '.php');
