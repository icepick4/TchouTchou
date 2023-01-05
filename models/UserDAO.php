<?php

require_once(PATH_MODELS . 'DAO.php');

/**
 * Class UserDAO
 * 
 */
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
     * Function to get all the users
     * @return array The users's data
     *
     */
    public function getAllUser()
    {
        $sql = 'SELECT * FROM USER_DATA';
        return $this->queryAll($sql);
    }
    
    public function getAllClient()
    {
        $sql = 'SELECT * FROM USER_DATA WHERE USER_CATEGORIE_ID = 0';
        return $this->queryAll($sql);
    }

    /**
     * Function to insert a new user
     * @return array The users's mails
     */
    public function getAllUserMail()
    {
        $sql = 'SELECT USER_MAIL FROM USER_DATA';
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

}
