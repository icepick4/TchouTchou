<?php

require_once(PATH_MODELS . 'DAO.php');

class MessageDAO extends DAO
{
    public function insertDiscussion($subject,$user_id,$mail,$phone,$lastName,$firstname)
    {
        if (isset($user_id))
        {
            $sql = 'INSERT INTO DISCUSSION (DISCUSSION_SUBJECT,DISCUSSION_USER_ID) VALUES (:subject,:user_id)';
            $args = array(':subject' => $subject, ':user_id' => $user_id);

        }
        else
        {
            $sql ='INSERT INTO DISCUSSION (DISCUSSION_SUBJECT,DISCUSSION_USER_MAIL,DISCUSSION_USER_PHONE,DISCUSSION_USER_LASTNAME,DISCUSSION_USER_FIRSTNAME) VALUES (:subject,:mail,:phone,:lastname,:firstname)';
            $args = array(':subject' => $subject, ':mail' => $mail, ':phone' => $phone, ':lastname' => $lastName, ':firstname' => $firstname);
        }
        $this->queryInsert($sql, $args);
    }
    public function insertMessage($message,$discussion_id,$sender)
    {
        $sql = 'INSERT INTO MESSAGE_SUPPORT (DISCUSSION_ID,MESSAGE_TIME,MESSAGE_CONTENT,SENDER) VALUES (:discussion_id,:message_time,:message,:sender)';
        $args = array(':discussion_id' => $discussion_id, ':message_time' => date('Y-m-d H:i:s'), ':message' => $message, ':sender' => $sender);

        $this->queryInsert($sql, $args);
    }   
}
