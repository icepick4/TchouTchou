<?php
require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'MessageDAO.php');

$user = new UserDAO();
$mailbox = new MessageDAO();

if ($user->isEmployee($_SESSION['user_id']))
{
    if($user->isStation($_SESSION['user_id']))
    {
        $discussions = $mailbox->getAllDisussions();
        $messages = $mailbox->getAllMessages();
    }else
    {
        $discussions = $mailbox->getUserDisussions($_SESSION['user_id']);
    } 
}
else
{
    $discussions = $mailbox->getUserDisussions($_SESSION['user_id']);
}

require_once(PATH_VIEWS . $page . '.php');