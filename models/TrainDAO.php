<?php

require_once(PATH_MODELS . 'DAO.php');

class TrainDAO extends DAO
{

    public function getStations()
    {
        $sql = 'SELECT * FROM STATION';
        return $this->queryAll($sql);
    }

    public function getTravel($id)
    {
        $sql = 'SELECT * FROM TRAVEL where TRAVEL_ID = :id';
        $args = array(':id' => $id,);
        return $this->queryRow($sql, $args);
    }
}
