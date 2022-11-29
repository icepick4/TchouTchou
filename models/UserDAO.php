<?php

require_once(PATH_MODELS . 'DAO.php');

class UserDAO extends DAO
{
    /**
     * Function to get the user's data by mail
     * @param string $mail The user's mail
     * @return array The user's data
     *
     */
    public function getUserByMail($mail)
    {
        $sql = 'SELECT * FROM USER_DATA where USER_MAIL = :mail';
        $args = array(':mail' => $mail,);
        return $this->queryRow($sql, $args);
    }

    /**
     * Function to get the user data by the user id
     * @param number $id The user's id
     * @return array The user's data
     *
     */
    public function getUserById($id)
    {
        $sql = 'SELECT * FROM USER_DATA where USER_ID = :id';
        $args = array(':id' => $id,);
        return $this->queryRow($sql, $args);
    }

    /**
     * Function to get all user's tickets
     * @param number $id The user's id
     * @return array The user's tickets
     * 
     */
    public function getTicketsById($id)
    {
        $sql = 'SELECT (SELECT STATION_NAME FROM STATION S1 WHERE S1.STATION_ID = T.START_STATION_ID) START_STATION_NAME, 
            (SELECT STATION_NAME FROM STATION S1 WHERE S1.STATION_ID = T.END_STATION_ID) END_STATION_NAME, 
            TO_CHAR(DEPARTURE_TIME, \'DD/MM/YYYY HH24:MI\') DEPARTURE_TIME,
            T.TRAVEL_ID 
            FROM TICKET T, TRAVEL TR, ARRIVAL_TO_STATION AOT WHERE TR.TRAVEL_ID = T.TRAVEL_ID AND T.USER_ID = :id and AOT.TRAVEL_ID = TR.TRAVEL_ID AND AOT.STATION_ID = T.END_STATION_ID';
        $args = array(':id' => $id,);
        return $this->queryAll($sql, $args);
    }

    /**
     * Function to get a ticket by id and user id
     * @param number $id The ticket's id
     * @param number $userId The user's id
     * @return array The ticket's data
     *
     */
    public function getTicketById($id, $user_id)
    {
        $sql = 'SELECT (SELECT STATION_NAME FROM STATION S1 WHERE S1.STATION_ID = T.START_STATION_ID) START_STATION_NAME,
            (SELECT STATION_NAME FROM STATION S1 WHERE S1.STATION_ID = T.END_STATION_ID) END_STATION_NAME, 
            TO_CHAR(DEPARTURE_TIME, \'DD/MM/YYYY HH24:MI\') DEPARTURE_TIME,
            TO_CHAR(ARRIVAL_TIME, \'DD/MM/YYYY HH24:MI\') ARRIVAL_TIME,
            TO_CHAR(DEPARTURE_TIME, \'DD/MM/YYYY\') START_TIME_DATE,
            getTimeArrival(TR.LINE_ID, T.START_STATION_ID, T.END_STATION_ID) DURATION,
            T.TRAVEL_ID, 
            TR.TRAIN_ID 
            FROM TICKET T, TRAVEL TR, ARRIVAL_TO_STATION AOT WHERE TR.TRAVEL_ID = T.TRAVEL_ID AND T.USER_ID = :user_id AND T.TRAVEL_ID = :id and AOT.TRAVEL_ID = TR.TRAVEL_ID AND AOT.STATION_ID = T.START_STATION_ID';
        $args = array(':id' => $id, ':user_id' => $user_id);
        return $this->queryRow($sql, $args);
    }

    /**
     * Function to get all the users
     * @return array The users's data
     *
     */
    public function getAllUser()
    {
        $sql = 'SELECT * FROM USER_DATA';
        return $this->queryAll($sql);
    }

    /**
     * Function to update the user's first name
     * @param number $id The user's id
     * @param string $firstName The new user's first name 
     * 
     */
    public function updateFirstName($id, $first_name)
    {
        $sql = 'UPDATE USER_DATA SET USER_FIRSTNAME = :first_name WHERE USER_ID = :id';
        $args = array(':id' => $id, ':first_name' => $first_name);
        $this->queryEdit($sql, $args);
    }

    /**
     * Function to update the user's last name
     * @param number $id The user's id
     * @param string $last_name The new user's last name
     *
     */
    public function updateLastName($id, $last_name)
    {
        $sql = 'UPDATE USER_DATA SET USER_LASTNAME = :last_name WHERE USER_ID = :id';
        $args = array(':id' => $id, ':last_name' => $last_name);
        $this->queryEdit($sql, $args);
    }

    /**
     * Function to update the user's phone number
     * @param number $id The user's id
     * @param string $phone_number The new user's phone number
     * 
     */
    public function updatePhone($id, $phone)
    {
        $sql = 'UPDATE USER_DATA SET USER_PHONE = :phone WHERE USER_ID = :id';
        $args = array(':id' => $id, ':phone' => $phone);
        $this->queryEdit($sql, $args);
    }    
    /**
     * Function to update the user's mail address
     *
     * @param  number $id The user's id
     * @param  string $mail The new user's mail address
     *
     */
    public function updateMail($id, $mail)
    {
        $sql = 'UPDATE USER_DATA SET USER_MAIL = :mail WHERE USER_ID = :id';
        $args = array(':id' => $id, ':mail' => $mail);
        $this->queryEdit($sql, $args);
    }    
    /**
     * Function to delete a user from the database
     *
     * @param  number $id The user's id
     *
     */
    public function deleteUser($id)
    {
        $sql = 'DELETE FROM USER_DATA WHERE USER_ID = :id';
        $args = array(':id' => $id);
        $this->queryEdit($sql, $args);
    }
    
    /**
     * Function to add a new user in the database
     *
     * @param  string $mail The user's mail address
     * @param  string $phone The user's phone number
     * @param  string $password The user's password
     * @param  string $lastName The user's last name
     * @param  string $firstName The user's first name
     * @param  number $userCat The user's category
     *
     */
    public function insertUser($mail, $phone, $password, $lastName, $firstName, $userCat)
    {
        $sql = "INSERT into USER_DATA(USER_MAIL,USER_PHONE,USER_PASSWORD,USER_LASTNAME,USER_FIRSTNAME,USER_CATEGORIE_ID) VALUES(:user_mail,:user_phone,:user_password,:lastname,:firstname,:cat)";
        $args = array(':user_mail' => $mail, ':user_phone' => $phone, ':user_password' => $password, ':lastname' => $lastName, ':firstname' => $firstName, ':cat' => $userCat);
        $this->queryEdit($sql, $args);
    }

    /**
     * Function to hash the password of a user
     *
     * @param  number $id The user's id
     * @param  string $password The user's password
     * @return string The hashed password
     *
     */
    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Function to get the category of a user
     *
     * @param  number $id The user's id
     * @return array The user's category
     *
     */
    public function getUserType($id)
    {
        $sql = 'SELECT USER_CATEGORIE_ID FROM USER_DATA WHERE USER_ID = :id';
        $args = array(':id' => $id);
        return $this->queryRow($sql, $args)['USER_CATEGORIE_ID'];
    }

    /**
     * Function to check if the user is an employee
     *
     * @param  number $id The user's id
     * @return boolean True if the user is an employee, false otherwise
     *
     */
    public function isEmployee($id)
    {
        return $this->getUserType($id) == 1;
    }

    /**
     * Function to check if the user is a customer
     *
     * @param  number $id The user's id
     * @return boolean True if the user is a customer, false otherwise
     *
     */
    public function isCustomer($id)
    {
        return $this->getUserType($id) == 0;
    }

    /**
     * Function to get the employee type of an employee
     *
     * @param  number $id The user's id
     * @return array The employee type
     *
     */
    public function getEmployeeType($id)
    {
        $sql = 'SELECT EMPLOYEE_ACCESS FROM EMPLOYEES_DATA WHERE USER_ID = :id';
        $args = array(':id' => $id);
        return $this->queryRow($sql, $args)['EMPLOYEE_ACCESS'];
    }

    /**
     * Function to check if the employee is a manager
     *
     * @param  number $id The user's id
     * @return boolean True if the employee is a manager, false otherwise
     *
     */
    public function isAdministrator($id)
    {
        return $this->getEmployeeType($id) == 1;
    }

    /**
     * Function to check if the employee is a station
     *
     * @param  number $id The user's id
     * @return boolean True if the employee is a station, false otherwise
     *
     */
    public function isStation($id)
    {
        return $this->getEmployeeType($id) == 2;
    }

    /**
     * Function to check if the employee is a driver
     *
     * @param  number $id The user's id
     * @return boolean True if the employee is a driver, false otherwise
     *
     */
    public function isDriver($id)
    {
        return $this->getEmployeeType($id) == 3;
    }

    /**
     * Function to check if the employee is a service
     *
     * @param  number $id The user's id
     * @return boolean True if the employee is a service, false otherwise
     *
     */
    public function isService($id)
    {
        return $this->getEmployeeType($id) == 4;
    }
}
