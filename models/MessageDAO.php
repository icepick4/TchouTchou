<?php

require_once(PATH_MODELS . 'DAO.php');

class MessageDAO extends DAO
{
    public function insertDiscussion($subject,$user_id,$mail,$phone,$lastName,$firstname)
    {
        $sql = 'SELECT MAX(DISCUSSION_ID) AS MAX FROM DISCUSSION_SUPPORT';
        $discussion_id = $this->queryRow($sql);
        if (isset($user_id))
        {
            $sql = 'INSERT INTO DISCUSSION_SUPPORT (DISCUSSION_ID,DISCUSSION_SUBJECT,USER_ID) VALUES (:id,:subject,:user_id)';
            $args = array(':id' => $discussion_id['MAX']+1,':subject' => $subject, ':user_id' => $_SESSION['user_id']);
        }
        else
        {   
            $sql ='INSERT INTO DISCUSSION_SUPPORT (DISCUSSION_ID,DISCUSSION_SUBJECT,USER_MAIL,USER_PHONE,USER_LASTNAME,USER_FIRSTNAME) VALUES (:id,:subject,:mail,:phone,:lastname,:firstname)';
            $args = array(':id' => $discussion_id['MAX']+1,':subject' => $subject, ':mail' => $mail, ':phone' => $phone, ':lastname' => $lastName, ':firstname' => $firstname);      
        }
        $this->queryInsert($sql, $args);
        return $discussion_id['MAX']+1;
    }
    public function insertMessageCustomer($message,$discussion_id)
    {
        $sql = 'INSERT INTO MESSAGE_SUPPORT (DISCUSSION_ID,MESSAGE_CONTENT,SENDER) VALUES (:discussion_id,:message,:sender)';
        $args = array(':discussion_id' => $discussion_id, ':message' => $message, ':sender' => 1);

        $this->queryInsert($sql, $args);
    }
    
    public function getAllDisussions()
    {
        $sql = 'SELECT * FROM DISCUSSION_SUPPORT ORDER BY DISCUSSION_ID DESC';
        return $this->queryAll($sql);
    }

    public function getUserDisussions($user_id)
    {
        $sql = 'SELECT * FROM DISCUSSION_SUPPORT WHERE USER_ID = :user_id';
        $args = array(':user_id' => $user_id);
        return $this->queryAll($sql,$args);
    }
}
