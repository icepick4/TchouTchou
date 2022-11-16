<?php

require_once(PATH_MODELS . 'DAO.php');

class TrainDAO extends DAO
{

    public function getStations()
    {
        $sql = 'SELECT * FROM STATION';
        return $this->queryAll($sql);
    }

    public function getTravelInfos($id)
    {
        $sql = 'SELECT * FROM TRAVEL where TRAVEL_ID = :id';
        $args = array(':id' => $id,);
        return $this->queryRow($sql, $args);
    }

    public function getAllTickets($tickets)
    {
        //get stations names with id
        for ($i = 0; $i < count($tickets); $i++) {
            $tickets[$i] = $this->getSingleTicketInfos($tickets[$i]);
        }
        return $tickets;
    }

    public function getStationInfos($id)
    {
        $sql = 'SELECT * FROM STATION where STATION_ID = :id';
        $args = array(':id' => $id,);
        return $this->queryRow($sql, $args);
    }

    public function getSingleTicketInfos($ticket)
    {
        $travel_id = $ticket['TRAVEL_ID'];
        $travel = $this->getTravelInfos($travel_id);
        $ticket['START_STATION_ID'] = $this->getStationInfos($ticket['START_STATION_ID'])['STATION_NAME'];
        $ticket['END_STATION_ID'] = $this->getStationInfos($ticket['END_STATION_ID'])['STATION_NAME'];
        $date = $travel['TRAVEL_DATETIME'];
        $date = new DateTime($date);
        $ticket['DATE'] = $date->format('d/m/Y');
        $startTime = $travel['START_TIME'];
        //get only hours and minutes
        $ticket['START_TIME'] = substr($startTime, 10, 15);
        $endTime = $travel['END_DATETIME'];
        //get only hours and minutes
        $ticket['END_TIME'] = substr($endTime, 10, 15);

        return $ticket;
    }
}
