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
}