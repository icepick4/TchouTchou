<?php

require_once(PATH_MODELS . 'DAO.php');

/**
 * Class UserDAO
 * 
 */
class StaffDAO extends DAO
{
    public function getAllStaff()
    {
        $sql = 'SELECT * FROM EMPLOYEES_DATA INNER JOIN USER_DATA ON EMPLOYEES_DATA.USER_ID = USER_DATA.USER_ID INNER JOIN EMPLOYEE_CATEGORIE ON EMPLOYEES_DATA.EMPLOYEE_ACCESS = EMPLOYEE_CATEGORIE.EMPLOYEE_CATEGORIE_ID ';
        return $this->queryAll($sql);   
    }

    public function getAllStaffType()
    {
        $sql = 'SELECT * FROM EMPLOYEE_CATEGORIE';
        return $this->queryAll($sql);   
    }

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

    public function setEmployeeType($id, $type)
    {
        $sql = 'UPDATE EMPLOYEES_DATA SET EMPLOYEE_ACCESS = :type WHERE USER_ID = :id';
        $args = array(':id' => $id, ':type' => $type);
        $this->queryEdit($sql, $args);
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

    public function isSupport($id)
    {
        return $this->getEmployeeType($id) == 5;
    }

    public function isHumanResource($id)
    {
        return $this->getEmployeeType($id) == 6;
    }

    public function getAllEmployees()
    {
        $sql = 'SELECT * FROM USER_DATA WHERE USER_CATEGORIE_ID = 1';
        return $this->queryAll($sql);
    }

    public function getDriverID($id)
    {
        $sql = 'SELECT DRIVER_ID FROM DRIVER WHERE USER_ID = :id';
        $args = array(':id' => $id);
        return $this->queryRow($sql, $args)['DRIVER_ID'];
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

    public function addEmployee($id,$staff_id)
    {
        $sql = 'INSERT INTO EMPLOYEES_DATA VALUES (:id,:staff_id)';
        $args = array(':id' => $id,':staff_id' => $staff_id);
        $this->queryEdit($sql, $args);
    }

    public function firedEmployee($id)
    {
        $sql = 'DELETE FROM EMPLOYEES_DATA WHERE USER_ID = :id';
        $args = array(':id' => $id);
        $this->queryEdit($sql, $args);
    }
}