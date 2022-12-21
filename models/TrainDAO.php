<?php

require_once(PATH_MODELS . 'DAO.php');

class TrainDAO extends DAO
{
    public function getTrains()
    {
        $sql = 'SELECT * FROM TRAIN INNER JOIN TRAIN_TYPE ON TRAIN.TRAIN_TYPE_ID = TRAIN_TYPE.TRAIN_TYPE_ID INNER JOIN TRAIN_STATUS ON TRAIN.TRAIN_STATUS_ID = TRAIN_STATUS.TRAIN_STATUS_ID ORDER BY TRAIN_ID ASC';
        $args = array();
        return $this->queryAll($sql, $args);
    }

    public function updateTrainStatus($status, $train_id)
    {
        $sql = 'UPDATE TRAIN SET TRAIN_STATUS_ID = :status WHERE TRAIN_ID = :train_id';
        $args = array(':status' => $status, ':train_id' => $train_id);
        $this->queryEdit($sql, $args);
    }

    /**
     * Getting the lines which are on the given date and the next one and between the given stations
     */
    public function getLinesOn($date_travel, $station_from, $station_to)
    {
        $sql = 'SELECT t.PRICE, t.START_TIME, t.TRAVEL_ID, l.LINE_ID, l.START_STATION_ID FROM LINE l, TRAVEL t WHERE l.START_STATION_ID = :station_from AND l.END_STATION_ID = :station_to AND l.LINE_ID IN (SELECT LINE_ID FROM TRAVEL WHERE START_TIME > TO_DATE(:date_travel,'."'".'yyyy/mm/dd'."'".') AND TO_DATE(:date_travel,'."'".'yyyy/mm/dd'."'".') < START_TIME + 1)';
        $args = array(':date_travel' => str_replace('-','/',$date_travel), ':station_from' => $station_from, ':station_to' => $station_to);
        return $this->queryAll($sql, $args);
    }

    public function getAllTrainsType()
    {
        $sql = 'SELECT * FROM TRAIN_TYPE';
        $args = array();
        return $this->queryAll($sql, $args);
    }

    public function getAllTrainsStatus()
    {
        $sql = 'SELECT * FROM TRAIN_STATUS';
        $args = array();
        return $this->queryAll($sql, $args);
    }

    public function addTrain($train_type)
    {
        $sql = 'INSERT INTO TRAIN (TRAIN_ID,TRAIN_TYPE_ID, TRAIN_STATUS_ID) VALUES ((SELECT MAX(TRAIN_ID) FROM TRAIN) +1,:train_type, 0)';
        $args = array(':train_type' => $train_type);
        $this->queryEdit($sql, $args);
    }

    public function getEmptySeats($travel_id, $line_id, $station_id)
    {
        $sql = 'SELECT EMPTYSEATS FROM EMPTYSEATATSTOP WHERE TRAVEL_ID = :travel_id AND LINE_ID = :line_id AND STATION_ID = :station_id';
        $args = array(':travel_id' => $travel_id, ':line_id' => $line_id, ':station_id' => $station_id);
        return $this->queryRow($sql, $args);
    }
}
