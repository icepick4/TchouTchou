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

    public function getInfosTicket($tickets, $stations)
    {
        //get stations names with id
        for ($i = 0; $i < count($tickets); $i++) {
            $sql = 'SELECT STATION_NAME FROM STATION WHERE STATION_ID = :id';
            $args = array(':id' => $tickets[$i]['START_STATION_ID'],);
            $tickets[$i]['START_STATION_ID'] = $this->queryRow($sql, $args)['STATION_NAME'];
            $args = array(':id' => $tickets[$i]['END_STATION_ID'],);
            $tickets[$i]['END_STATION_ID'] = $this->queryRow($sql, $args)['STATION_NAME'];
            $tickets[$i]['DATE'] = $this->getTravel($tickets[$i]['TRAVEL_ID'])['TRAVEL_DATETIME'];
        }
        return $tickets;
    }
}
