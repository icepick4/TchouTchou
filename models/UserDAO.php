<?php

require_once(PATH_MODELS . 'DAO.php');

class UserDAO extends DAO
{
    public function getUserByMail($mail)
    {
        $sql = 'SELECT * FROM USER_DATA where USER_MAIL = :mail';
        $args = array(':mail' => $mail,);
        return $this->queryRow($sql, $args);
    }
    public function getUserById($id)
    {
        $sql = 'SELECT * FROM USER_DATA where USER_ID = :id';
        $args = array(':id' => $id,);
        return $this->queryRow($sql, $args);
    }
    public function getTicketsById($id)
    {
        $sql = 'SELECT * FROM TICKET where USER_ID = :id';
        $args = array(':id' => $id,);
        return $this->queryAll($sql, $args);
    }
    public function getTicketById($id, $user_id)
    {
        $sql = 'SELECT * FROM TICKET where TRAVEL_ID = :id AND USER_ID = :user_id';
        $args = array(':id' => $id, ':user_id' => $user_id);
        return $this->queryRow($sql, $args);
    }
    public function getAllUser()
    {
        $sql = 'SELECT * FROM USER_DATA';
        return $this->queryAll($sql);
    }
}
