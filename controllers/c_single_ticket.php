<?php
require_once(PATH_MODELS . 'user.php');

if (!$_SESSION['logged']) {
    $page = "login";
} else {
    $user = new UserDAO(true);
    $ticket = $user->getSingleTicket($_SESSION['user_id'], $_GET['id']);
}
