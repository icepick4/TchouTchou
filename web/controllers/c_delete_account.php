<?php

require_once(PATH_MODELS . 'UserDAO.php');
$user = new UserDAO();
if (isset($_GET['verif'])) {
    if ($result['USER_CATEGORIE_ID'] == 0) {
        if (($_GET['verif'] == 214428544845492) && isset($_SESSION['user_id'])) {
            $user->deleteUser($_SESSION['user_id']);
            $_SESSION = array();
        }
        header("Location: index.php?page=home");
    }
}