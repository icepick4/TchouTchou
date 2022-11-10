<?php

require_once(PATH_MODELS.'DAO.php');

class UserDAO extends DAO{
    public function getAllImage()
    {
        return $this->queryAll("SELECT * FROM USER_DATA");
    }
}