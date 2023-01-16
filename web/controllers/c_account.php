<?php
require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'StaffDAO.php');
$mail_already_used = false;
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
        $result = $user->getUserByMail($_POST['mail']);
        if(empty($result)){
            $user->updateMail($_SESSION['user_id'], $_POST['mail']);
        }
        else{
            $mail_already_used = true;
        }
    }
    $result = $user->getUserById($_SESSION['user_id']);
}

$staff = new StaffDAO();


require_once(PATH_VIEWS . $page . '.php');
