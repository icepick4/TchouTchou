<?php
require_once(PATH_MODELS . 'user.php');


if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {
    $user = new UserDAO(true);
    $result = $user->getTickets($_SESSION['user_id']);
}
