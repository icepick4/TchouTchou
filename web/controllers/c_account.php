<?php
require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'StaffDAO.php');
if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {
    $user = new UserDAO();
    if (isset($_POST['first-name'])) {
        $user->updateFirstName($_SESSION['user_id'], $_POST['first-name']);
    }
    if (isset($_POST['last-name'])) {
        $user->updateLastName($_SESSION['user_id'], $_POST['last-name']);
    }
    if (isset($_POST['phone'])) {
        $user->updatePhone($_SESSION['user_id'], $_POST['phone']);
    }
    if (isset($_POST['mail'])) {
        $user->updateMail($_SESSION['user_id'], $_POST['mail']);
    }
    $result = $user->getUserById($_SESSION['user_id']);
}

$staff = new StaffDAO();


require_once(PATH_VIEWS . $page . '.php');
