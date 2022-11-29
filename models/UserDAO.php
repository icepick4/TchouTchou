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
            DEPARTURE_TIME,
            T.TRAVEL_ID 
            FROM TICKET T, TRAVEL TR, ARRIVAL_TO_STATION AOT WHERE TR.TRAVEL_ID = T.TRAVEL_ID AND T.USER_ID = :id and AOT.TRAVEL_ID = TR.TRAVEL_ID AND AOT.STATION_ID = T.END_STATION_ID';
        $args = array(':id' => $id,);
        return $this->queryAll($sql, $args);
    }
    public function getTicketById($id, $user_id)
    {
        $sql = 'SELECT (SELECT STATION_NAME FROM STATION S1 WHERE S1.STATION_ID = T.START_STATION_ID) START_STATION_NAME,
            (SELECT STATION_NAME FROM STATION S1 WHERE S1.STATION_ID = T.END_STATION_ID) END_STATION_NAME, 
            ARRIVAL_TIME,
            DEPARTURE_TIME,
            MIN,
            T.TRAVEL_ID, 
            TR.TRAIN_ID 
            FROM TICKET T, TRAVEL TR, ARRIVAL_TO_STATION AOT WHERE TR.TRAVEL_ID = T.TRAVEL_ID AND T.USER_ID = :user_id AND T.TRAVEL_ID = :id and AOT.TRAVEL_ID = TR.TRAVEL_ID AND AOT.STATION_ID = T.START_STATION_ID';
        $args = array(':id' => $id, ':user_id' => $user_id);
        return $this->queryRow($sql, $args);
    }
    public function getAllUser()
    {
        $sql = 'SELECT * FROM USER_DATA';
        return $this->queryAll($sql);
    }
    public function updateFirstName($id, $first_name)
    {
        $sql = 'UPDATE USER_DATA SET USER_FIRSTNAME = :first_name WHERE USER_ID = :id';
        $args = array(':id' => $id, ':first_name' => $first_name);
        return $this->queryInsert($sql, $args);
    }
    public function updateLastName($id, $last_name)
    {
        $sql = 'UPDATE USER_DATA SET USER_LASTNAME = :last_name WHERE USER_ID = :id';
        $args = array(':id' => $id, ':last_name' => $last_name);
        return $this->queryInsert($sql, $args);
    }
    public function updatePhone($id, $phone)
    {
        $sql = 'UPDATE USER_DATA SET USER_PHONE = :phone WHERE USER_ID = :id';
        $args = array(':id' => $id, ':phone' => $phone);
        return $this->queryInsert($sql, $args);
    }    
    /**
     * Function to update the mail address of a user
     *
     * @param  number $id
     * @param  string $mail
     * @return array
     *
     */
    public function updateMail($id, $mail)
    {
        $sql = 'UPDATE USER_DATA SET USER_MAIL = :mail WHERE USER_ID = :id';
        $args = array(':id' => $id, ':mail' => $mail);
        return $this->queryInsert($sql, $args);
    }    
    /**
     * Function to delete a user from the database
     *
     * @param  number $id
     *
     */
    public function deleteUser($id)
    {
        $sql = 'DELETE FROM USER_DATA WHERE USER_ID = :id';
        $args = array(':id' => $id);
        return $this->queryInsert($sql, $args);
    }
    
    /**
     * Function to add a new user in the database
     *
     * @param  string $mail
     * @param  string $phone
     * @param  string $password
     * @param  string $lastName
     * @param  string $firstName
     * @param  number $userCat
     *
     */
    public function insertUser($mail, $phone, $password, $lastName, $firstName, $userCat)
    {
        $sql = "INSERT into USER_DATA(USER_MAIL,USER_PHONE,USER_PASSWORD,USER_LASTNAME,USER_FIRSTNAME,USER_CATEGORIE_ID) VALUES(:user_mail,:user_phone,:user_password,:lastname,:firstname,:cat)";
        $args = array(':user_mail' => $mail, ':user_phone' => $phone, ':user_password' => $password, ':lastname' => $lastName, ':firstname' => $firstName, ':cat' => $userCat);
        $this->queryInsert($sql, $args);
    }

    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function getUserType($id)
    {
        $sql = 'SELECT USER_CATEGORIE_ID FROM USER_DATA WHERE USER_ID = :id';
        $args = array(':id' => $id);
        return $this->queryRow($sql, $args)['USER_CATEGORIE_ID'];
    }

    public function isEmployee($id)
    {
        return $this->getUserType($id) == 1;
    }

    public function isCustomer($id)
    {
        return $this->getUserType($id) == 0;
    }

    public function getEmployeeType($id)
    {
        $sql = 'SELECT EMPLOYEE_ACCESS FROM EMPLOYEES_DATA WHERE USER_ID = :id';
        $args = array(':id' => $id);
        return $this->queryRow($sql, $args)['EMPLOYEE_ACCESS'];
    }

    public function isAdministrator($id)
    {
        return $this->getEmployeeType($id) == 1;
    }

    public function isStation($id)
    {
        return $this->getEmployeeType($id) == 2;
    }

    public function isDriver($id)
    {
        return $this->getEmployeeType($id) == 3;
    }

    public function isService($id)
    {
        return $this->getEmployeeType($id) == 4;
    }


    // 0
}
