<?php
require_once(PATH_LIB . 'connexionBDD.php');

if (!$_SESSION['logged']) {
    // header("Location: index.php?page=login");
    // die();
} else {
    // $user = new UserDAO(true);
    // $ticket = $user->getSingleTicket($_SESSION['user_id'], $_GET['id']);
}

require_once(PATH_VIEWS . $page . '.php');
