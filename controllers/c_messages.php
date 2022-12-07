<?php
require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'MessageDAO.php');

$user = new UserDAO();
$mailbox = new MessageDAO();
//removed condition with isEmployee
if ($user->isSupport($_SESSION['user_id'])) {
    $discussions = $mailbox->getAllDisussions();
} else {
    $discussions = $mailbox->getUserDisussions($_SESSION['user_id']);
}
if (isset($_POST['message'])) {
    if (isset($_SESSION['user_id'])) {
        $mailbox->insertMessage($_POST['message'], $_POST['discussion_id'], $_SESSION['user_id']);
    }
}
require_once(PATH_VIEWS . $page . '.php');
