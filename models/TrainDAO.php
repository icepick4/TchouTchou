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
        $sql = 'SELECT t.PRICE,
        TO_CHAR(t.START_TIME, \'HH24:MI\') AS START_TIME,
        TO_CHAR(tet.END_TIME, \'HH24:MI\') AS END_TIME,
        TIME_MIN AS DURATION, 
        t.TRAVEL_ID, 
        l.LINE_ID, 
        l.START_STATION_ID 
        FROM LINE l
        INNER JOIN TRAVEL t ON l.LINE_ID = t.LINE_ID
        INNER JOIN TRAVEL_WITH_ET tet ON t.TRAVEL_ID = tet.TRAVEL_ID
        WHERE l.START_STATION_ID = :station_from 
        AND l.END_STATION_ID = :station_to 
        AND l.LINE_ID IN (
            SELECT LINE_ID 
            FROM TRAVEL 
            WHERE TO_CHAR(t.START_TIME,\'DD/MM/YY\') = TO_CHAR(TO_DATE(:date_travel,\'YYYY/MM/DD\'),\'DD/MM/YY\')
            AND t.START_TIME > TRUNC(SYSDATE+1/24))';
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
