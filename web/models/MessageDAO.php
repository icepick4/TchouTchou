<?php

require_once(PATH_MODELS . 'DAO.php');

class MessageDAO extends DAO
{
    public function insertDiscussion($subject, $user_id, $mail, $phone, $lastName, $firstname, $destination_id)
    {
        $sql = 'SELECT MAX(DISCUSSION_ID) AS MAX FROM DISCUSSION';
        $discussion_id = $this->queryRow($sql);
        if (isset($user_id)) {
            $sql = 'INSERT INTO DISCUSSION (DISCUSSION_ID,DISCUSSION_SUBJECT,USER_ID,DESTINATION_ID) VALUES (:id,:subject,:user_id,:destination_id)';
            $args = array(':id' => $discussion_id['MAX'] + 1, ':subject' => $subject, ':user_id' => $user_id, ':destination_id' => $destination_id);
        } else {
            $sql = 'INSERT INTO DISCUSSION (DISCUSSION_ID,DISCUSSION_SUBJECT,USER_MAIL,USER_PHONE,USER_LASTNAME,USER_FIRSTNAME,DESTINATION_ID) VALUES (:id,:subject,:mail,:phone,:lastname,:firstname,:destination_id)';
            $args = array(':id' => $discussion_id['MAX'] + 1, ':subject' => $subject, ':mail' => $mail, ':phone' => $phone, ':lastname' => $lastName, ':firstname' => $firstname, ':destination_id' => $destination_id );
        }
        $this->queryEdit($sql, $args);
        return $discussion_id['MAX'] + 1;
    }
    public function insertMessage($message, $discussion_id, $sender_id)
    {
        $sql = 'INSERT INTO MESSAGE (DISCUSSION_ID,MESSAGE_CONTENT,SENDER_ID) VALUES (:discussion_id,:message,:sender)';
        $args = array(':discussion_id' => $discussion_id, ':message' => $message, ':sender' => $sender_id);
        $this->queryEdit($sql, $args);
    }

    public function getUserDiscussions($user_id)
    {
        $sql = 'SELECT * FROM DISCUSSION WHERE (USER_ID = :user_id OR DESTINATION_ID = :user_id) AND (DESTINATION_ID IN (SELECT USER_ID FROM EMPLOYEES_DATA WHERE EMPLOYEES_DATA.EMPLOYEE_ACCESS = 5)  AND USER_ID NOT IN (SELECT USER_ID FROM EMPLOYEES_DATA)) ORDER BY CREATION_TIME DESC';
        $args = array(':user_id' => $user_id);
        return $this->queryAll($sql, $args);
    }

    public function getDiscussionBetweenUsers($user_id, $destination_id)
    {
        $sql = 'SELECT * FROM DISCUSSION WHERE (USER_ID = :user_id AND DESTINATION_ID = :destination_id) OR (USER_ID = :destination_id AND DESTINATION_ID = :user_id)';
        $args = array(':user_id' => $user_id, ':destination_id' => $destination_id);
        return $this->queryRow($sql, $args);
    }

    public function getDiscussionById($id)
    {
        $sql = 'SELECT * FROM MESSAGE WHERE DISCUSSION_ID = :id ORDER BY MESSAGE_TIME ASC';
        $args = array(':id' => $id);
        return $this->queryAll($sql, $args);
    }

    public function getDiscussionSubjectById($id)
    {
        $sql = 'SELECT DISCUSSION_SUBJECT FROM DISCUSSION WHERE DISCUSSION_ID = :id';
        $args = array(':id' => $id);
        return $this->queryRow($sql, $args);
    }

    public function getDiscussionHeaderById($id)
    {
        $sql = 'SELECT * FROM DISCUSSION WHERE DISCUSSION_ID = :id';
        $args = array(':id' => $id);
        return $this->queryRow($sql, $args);
    }

    public function storeDiscussion($id, $status){
        $sql = 'UPDATE DISCUSSION SET STATUS = :status WHERE DISCUSSION_ID = :id';
        $args = array(':id' => $id, ':status' => $status);
        $this->queryEdit($sql, $args);
    }

}
