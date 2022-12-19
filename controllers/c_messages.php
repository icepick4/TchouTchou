<?php
require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'MessageDAO.php');

if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {
    $user = new UserDAO();
    $mailbox = new MessageDAO();
    //removed condition with isEmployee
    $discussions = $mailbox->getUserDisussions($_SESSION['user_id']);
    if (isset($_POST['message'])) {
        if (isset($_SESSION['user_id'])) {
            $mailbox->insertMessage($_POST['message'], $_POST['discussion_id'], $_SESSION['user_id']);
            $_POST = array();
        }
    }
}
require_once(PATH_VIEWS . $page . '.php');
