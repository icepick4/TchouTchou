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
        l.START_STATION_ID,
        l.END_STATION_ID 
        FROM LINE l
        INNER JOIN TRAVEL t ON l.LINE_ID = t.LINE_ID
        INNER JOIN TRAVEL_WITH_ET tet ON t.TRAVEL_ID = tet.TRAVEL_ID
        WHERE :station_from IN (SELECT STATION_ID FROM LINE_STOP l2 WHERE l2.LINE_ID = l.LINE_ID)
        AND :station_to IN (SELECT STATION_ID FROM LINE_STOP l2 WHERE l2.LINE_ID = l.LINE_ID AND ORDER_STOP > (SELECT ORDER_STOP FROM LINE_STOP WHERE l2.LINE_ID = LINE_ID AND STATION_ID = :station_from))
        AND l.LINE_ID IN (
            SELECT LINE_ID 
            FROM TRAVEL 
            WHERE TO_CHAR(t.START_TIME,\'DD/MM/YY\') = TO_CHAR(TO_DATE(:date_travel,\'YYYY/MM/DD\'),\'DD/MM/YY\')
            AND t.START_TIME > TRUNC(SYSDATE+1/24)) ORDER BY t.START_TIME ASC';
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

    public function getEmptySeats($travel_id, $line_id, $start_station_id, $end_station_id)
    {
        $sql = 'SELECT EMPTYSEATS FROM EMPTYSEATATSTOP WHERE TRAVEL_ID = :travel_id AND LINE_ID = :line_id AND START_STATION_ID = :start_station_id AND NEXT_STATION_ID = :end_station_id';
        $args = array(':travel_id' => $travel_id, ':line_id' => $line_id, ':start_station_id' => $start_station_id, ':end_station_id' => $end_station_id);
        return $this->queryRow($sql, $args);
    }

    public function getTrainType($travel_id)
    {
        $sql = 'SELECT TRAIN_TYPE_ID FROM TRAIN inner join TRAVEL on TRAIN.TRAIN_ID=TRAVEL.TRAIN_ID where TRAVEL_ID = :travel_id';
        $args = array(':travel_id' => $travel_id);
        return $this->queryRow($sql, $args);
    }

    public function getBusySeats($travel_id,$start_station_id)
    {
        $sql = 'SELECT PLACE_ID FROM TICKET ti
                INNER JOIN TRAVEL tr ON ti.TRAVEL_ID = tr.TRAVEL_ID
                WHERE ti.TRAVEL_ID = :travel_id
                AND (SELECT ORDER_STOP FROM LINE_STOP ls WHERE ls.LINE_ID = tr.LINE_ID AND STATION_ID = :start_station_id) < (SELECT ORDER_STOP FROM LINE_STOP ls WHERE ls.LINE_ID = tr.LINE_ID AND STATION_ID = ti.END_STATION_ID)
        ';
        $args = array(':travel_id' => $travel_id, ':start_station_id' => $start_station_id);
        return $this->queryAll($sql, $args);
    }
}
