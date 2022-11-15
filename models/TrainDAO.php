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
        $ticket['DATE'] = $travel['TRAVEL_DATETIME'];
        $ticket['START_TIME'] = $this->getTravelInfos($travel_id)['START_TIME'];
        $ticket['END_TIME'] = $this->getTravelInfos($travel_id)['END_DATETIME'];
        return $ticket;
    }
}
