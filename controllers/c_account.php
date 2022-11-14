<?php
require_once(PATH_MODELS . 'user.php');

if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {
    $user = new UserDAO(true);
    $result = $user->getUserId($_SESSION['user_id']);
}



require_once(PATH_VIEWS . $page . '.php');
