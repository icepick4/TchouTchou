<?php

require_once(PATH_MODELS . 'UserDAO.php');

class CustomerDAO extends UserDAO
{
    public function getAllCustomers()
    {
        $sql = 'SELECT * FROM USER_DATA WHERE USER_CATEGORIE_ID = 0';
        return $this->queryAll($sql);
    }

    public function isCustomer($id)
    {
        return $this->getUserType($id) == 0;
    }
}