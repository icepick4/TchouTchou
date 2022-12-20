<?php
require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'MessageDAO.php');

if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {
    $user = new UserDAO();
    $mailbox = new MessageDAO();
    $discussions = $mailbox->getUserDisussions($_SESSION['user_id']);
    $isEmployee = false;
    $isSupport = false;
    if($user->isEmployee($_SESSION['user_id'])){
        $isEmployee = true;
        $employees = $user->getAllEmployees();
        if($user->isSupport($_SESSION['user_id'])){
            $isSupport = true;
        }
    }
    if (isset($_POST['message'])) {
        if (isset($_SESSION['user_id'])) {
            $mailbox->insertMessage($_POST['message'], $_POST['discussion_id'], $_SESSION['user_id']);
            header("Location: index.php?page=messages");
        }
    }
}

require_once(PATH_VIEWS . $page . '.php');
