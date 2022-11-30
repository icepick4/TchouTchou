<?php

require_once(PATH_MODELS . 'DAO.php');

class MessageDAO extends DAO
{
    public function insertDiscussion($subject, $user_id, $mail, $phone, $lastName, $firstname)
    {
        $sql = 'SELECT MAX(DISCUSSION_ID) AS MAX FROM DISCUSSION_SUPPORT';
        $discussion_id = $this->queryRow($sql);
        if (isset($user_id)) {
            $sql = 'INSERT INTO DISCUSSION_SUPPORT (DISCUSSION_ID,DISCUSSION_SUBJECT,USER_ID) VALUES (:id,:subject,:user_id)';
            $args = array(':id' => $discussion_id['MAX'] + 1, ':subject' => $subject, ':user_id' => $_SESSION['user_id']);
        } else {
            $sql = 'INSERT INTO DISCUSSION_SUPPORT (DISCUSSION_ID,DISCUSSION_SUBJECT,USER_MAIL,USER_PHONE,USER_LASTNAME,USER_FIRSTNAME) VALUES (:id,:subject,:mail,:phone,:lastname,:firstname)';
            $args = array(':id' => $discussion_id['MAX'] + 1, ':subject' => $subject, ':mail' => $mail, ':phone' => $phone, ':lastname' => $lastName, ':firstname' => $firstname);
        }
        $this->queryEdit($sql, $args);
        return $discussion_id['MAX'] + 1;
    }
    public function insertMessage($message, $discussion_id, $sender_id)
    {
        $sql = 'INSERT INTO MESSAGE_SUPPORT (DISCUSSION_ID,MESSAGE_CONTENT,SENDER) VALUES (:discussion_id,:message,:sender)';
        $args = array(':discussion_id' => $discussion_id, ':message' => $message, ':sender' => $sender_id);

        $this->queryEdit($sql, $args);
    }

    public function insertMessageCustomer($message, $discussion_id)
    {
        $this->insertMessage($message, $discussion_id, 1);
    }

    public function insertMessageSupport($message, $discussion_id)
    {
        $this->insertMessage($message, $discussion_id, 2);
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
        return $this->queryAll($sql, $args);
    }

    public function getAllMessages()
    {
        $sql = 'SELECT * FROM MESSAGE_SUPPORT ORDER BY MESSAGE_TIME ASC';
        return $this->queryAll($sql);
    }

    public function getDiscussionById($id)
    {
        $sql = 'SELECT * FROM MESSAGE_SUPPORT WHERE DISCUSSION_ID = :id ORDER BY MESSAGE_TIME ASC';
        $args = array(':id' => $id);
        return $this->queryAll($sql, $args);
    }

    public function getDiscussionSubjectById($id)
    {
        $sql = 'SELECT DISCUSSION_SUBJECT FROM DISCUSSION_SUPPORT WHERE DISCUSSION_ID = :id';
        $args = array(':id' => $id);
        return $this->queryRow($sql, $args);
    }
}
