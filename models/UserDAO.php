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
        $sql = 'SELECT (SELECT STATION_NAME FROM STATION S1 WHERE S1.STATION_ID = T.START_STATION_ID) START_STATION_NAME, 
            (SELECT STATION_NAME FROM STATION S1 WHERE S1.STATION_ID = T.END_STATION_ID) END_STATION_NAME, 
            TRAVEL_DATETIME,
            T.TRAVEL_ID 
            FROM TICKET T, TRAVEL TR WHERE TR.TRAVEL_ID = T.TRAVEL_ID AND USER_ID = :id';
        $args = array(':id' => $id,);
        return $this->queryAll($sql, $args);
    }
    public function getTicketById($id, $user_id)
    {
        $sql = 'SELECT (SELECT STATION_NAME FROM STATION S1 WHERE S1.STATION_ID = T.START_STATION_ID) START_STATION_NAME,
            (SELECT STATION_NAME FROM STATION S1 WHERE S1.STATION_ID = T.END_STATION_ID) END_STATION_NAME, 
            TRAVEL_DATETIME, 
            extract (hour from START_TIME) START_TIME_HOUR, 
            extract (minute from START_TIME) START_TIME_MINUTE,
            extract (hour from END_TIME) END_TIME_HOUR,
            extract (minute from END_TIME) END_TIME_MINUTE,
            END_TIME, 
            T.TRAVEL_ID, 
            TR.TRAIN_ID 
            FROM TICKET T, TRAVEL TR WHERE TR.TRAVEL_ID = T.TRAVEL_ID AND USER_ID = :user_id AND T.TRAVEL_ID = :id';
        $args = array(':id' => $id, ':user_id' => $user_id);
        return $this->queryRow($sql, $args);
    }
    public function getAllUser()
    {
        $sql = 'SELECT * FROM USER_DATA';
        return $this->queryAll($sql);
    }

    public function insertUser($mail,$phone,$password,$lastName,$firstName,$userCat){
        $sql = "INSERT into USER_DATA(USER_MAIL,USER_PHONE,USER_PASSWORD,USER_LASTNAME,USER_FIRSTNAME,USER_CATEGORIE_ID) VALUES("."'"."$mail"."','"."$phone"."','"."$password"."','"."$lastName"."','"."$firstName"."'".",$userCat)";
        $temp=$this->queryRow($sql);
    }

    public function hashPassword($password)
    {
        return password_hash($password,PASSWORD_DEFAULT);
    }
    // 0
}
