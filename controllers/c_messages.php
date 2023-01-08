<?php
require_once(PATH_MODELS . 'StaffDAO.php');
require_once(PATH_MODELS . 'MessageDAO.php');

$staff = new StaffDAO();
$messageTooLong = 0;
if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {
    $mailbox = new MessageDAO();
    $discussions = $mailbox->getUserDisussions($_SESSION['user_id']);
    $isEmployee = false;
    $isSupport = false;
    if ($staff->isEmployee($_SESSION['user_id'])) {
        $isEmployee = true;
        $employees = $staff->getAllEmployees();
        if ($staff->isSupport($_SESSION['user_id'])) {
            $isSupport = true;
        }
    }
    if (isset($_POST['message'])) {
        if (isset($_SESSION['user_id'])) {
            if (!(strlen($_POST['message']) > 1000)) {
                $mailbox->insertMessage($_POST['message'], $_POST['discussion_id'], $_SESSION['user_id']);
                $messageTooLong = 0;
            } else {
                $messageTooLong = 1;
            }
            if (isset($_GET['extern'])) {
                header("Location: index.php?page=messages&extern=true&messageTooLong=" . $messageTooLong);
            } else {
                header("Location: index.php?page=messages&messageTooLong="  . $messageTooLong);
            }
        }
    }
}

require_once(PATH_VIEWS . $page . '.php');
