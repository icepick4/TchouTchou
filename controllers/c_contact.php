<?php

require_once(PATH_MODELS . 'MessageDAO.php');
if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['subject']) && isset($_POST['desc']))
    {
        $subject = $_POST['subject'];
        $desc = $_POST['desc'];
        $messageDAO = new MessageDAO();
        $result = $messageDAO->insertDiscussion($subject,$_SESSION['user_id'],null,null,null,null);
        $messageDAO->insertMessage($desc,$result,$_SESSION['user_id']);
    }
} 
else 
{
    if (isset($_POST['name']) && isset($_POST['fname']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['desc']))
    {
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $desc = $_POST['desc'];
        $messageDAO = new MessageDAO();
        $result = $messageDAO->insertDiscussion($subject,null,$email,$tel,$name,$fname);
        $messageDAO->insertMessage($desc,$result,null);
    }
}
require_once(PATH_VIEWS . $page . '.php');
