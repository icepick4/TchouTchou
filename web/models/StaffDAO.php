<?php

require_once(PATH_MODELS . 'UserDAO.php');

/**
 * Class UserDAO
 * 
 */
class StaffDAO extends UserDAO
{
    public function getAllStaff()
    {
        $sql = 'SELECT * FROM EMPLOYEES_DATA INNER JOIN USER_DATA ON EMPLOYEES_DATA.USER_ID = USER_DATA.USER_ID INNER JOIN EMPLOYEE_CATEGORIE ON EMPLOYEES_DATA.EMPLOYEE_ACCESS = EMPLOYEE_CATEGORIE.EMPLOYEE_CATEGORIE_ID ORDER BY EMPLOYEE_CATEGORIE_ID';
        return $this->queryAll($sql);   
    }

    public function getAllStaffSlpied()
    {
        $staff_list = $this->getAllStaff();
        $staff_split = array();
        foreach ($staff_list as $staff) {
 
            if ( !isset($staff_split[$staff['EMPLOYEE_CATEGORIE_LABEL']])
                || $staff_split[$staff['EMPLOYEE_CATEGORIE_LABEL']] == null){
                $staff_split[$staff['EMPLOYEE_CATEGORIE_LABEL']] = array();
                }
            array_push($staff_split[$staff['EMPLOYEE_CATEGORIE_LABEL']], $staff);
        }

        return $staff_split;
         
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

    public function addEmployee($id,$staff_id)
    {
        $sql = 'INSERT INTO EMPLOYEES_DATA VALUES (:id,:staff_id, null)';
        $args = array(':id' => $id,':staff_id' => $staff_id);
        $this->queryEdit($sql, $args);
    }

    public function firedEmployee($id)
    {
        $sql = 'DELETE FROM EMPLOYEES_DATA WHERE USER_ID = :id';
        $args = array(':id' => $id);
        $this->queryEdit($sql, $args);
    }

    public function getNbrDriverTravelPlanned($user_id)
    {
        $sql = 'SELECT COUNT(*) AS NBR FROM TRAVEL INNER JOIN DRIVER ON TRAVEL.DRIVER_ID = DRIVER.DRIVER_ID WHERE USER_ID = :USER_ID ';
        $args = array(':USER_ID' => $user_id);
        return $this->queryRow($sql, $args)['NBR'];
    }


    public function getEmployeeStation($user_id)
    {
        $sql = 'SELECT STATION_ATTACH FROM EMPLOYEES_DATA  WHERE USER_ID = :USER_ID AND EMPLOYEE_ACCESS = 2';
        $args = array(':USER_ID' => $user_id);
        return $this->queryRow($sql, $args);
    }

    public function getDriverAbility($driver_id){
        $sql = '    SELECT  tt.TRAIN_TYPE_ID, tt.TRAIN_TYPE_LABEL,
     nvl((SELECT 1 FROM TCHOU.DRIVER_ABILITY da2 
     WHERE da2.DRIVER_ID = :driver_id AND da2.TRAIN_TYPE_ID= TT.TRAIN_TYPE_ID  ),0) AS  DRIVER_ABILITY fROM tchou.TRAIN_TYPE tt';
        $args = array(':driver_id' => $driver_id);
        return $this->queryAll($sql, $args);

    }

    public function setDriverAbility($driver_id, $ability, $value){


        if ($value == 'false'){
            echo 'remove : ' , $value;
            $sql = 'DELETE FROM DRIVER_ABILITY WHERE DRIVER_ID = :driver_id
            AND TRAIN_TYPE_ID = :ability';
            $args = array(':driver_id' => $driver_id, 
                ':ability' => $ability);
        }else{
            echo 'add : ' , $value;
            $sql = 'BEGIN
            INSERT INTO DRIVER_ABILITY VALUES (:driver_id, :ability);
            EXCEPTION
                WHEN dup_val_on_index THEN
                    NULL; -- Intentionally ignore duplicates
            END;';
            $args = array(':driver_id' => $driver_id, 
                ':ability' => $ability);
        }

        $this->queryEdit($sql, $args);

    }


}