<?php

require_once(PATH_MODELS . 'UserDAO.php');
$user = new UserDAO(true);
if (isset($_GET['verif'])) {
    if (($_GET['verif'] == 214428544845492) && isset($_SESSION['user_id'])) {
        $user->deleteUser($_SESSION['user_id']);
        $_SESSION = array();
    }
}
header("Location: index.php?page=home");
