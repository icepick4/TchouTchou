<?php

require_once(PATH_MODELS . 'MessageDAO.php');
require_once(PATH_MODELS . 'UserDAO.php');
if (isset($_SESSION['user_id'])) { ;
    if (isset($_POST['subject']) && isset($_POST['desc']))
    {
        $subject = $_POST['subject'];
        $desc = $_POST['desc'];
        $messageDAO = new MessageDAO();
        $result = $messageDAO->insertDiscussion($subject,$_SESSION['user_id'],null,null,null,null,99);
        $messageDAO->insertMessage($desc,$result,$_SESSION['user_id']);
    }
} 
else 
{
    if (isset($_POST['name']) && isset($_POST['fname']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['desc']))
    {
        $userDAO = new UserDAO();

        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $desc = $_POST['desc'];

        $messageDAO = new MessageDAO();
        $user = $userDAO->getUserByMail($email);
        if ($user != null)
        {
            $result = $messageDAO->insertDiscussion($subject,$user['USER_ID'],null,null,null,null,99);
            $messageDAO->insertMessage($desc,$result,$user['USER_ID']);
        }
        else{
            $result = $messageDAO->insertDiscussion($subject,null,$email,$tel,$name,$fname,99);
            $messageDAO->insertMessage($desc,$result,null);
        }
        
        
        
    }
}
require_once(PATH_VIEWS . $page . '.php');
