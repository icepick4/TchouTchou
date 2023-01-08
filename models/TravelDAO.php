<?php

require_once(PATH_MODELS . 'DAO.php');

class TravelDAO extends DAO
{

    public function getTravelsOn($date_travel, $station_from, $station_to)
    {
        $sql = 'SELECT t.PRICE,
        TO_CHAR(t.START_TIME, \'HH24:MI\') AS START_TIME,
        TO_CHAR(tet.END_TIME, \'HH24:MI\') AS END_TIME,
        TIME_MIN AS DURATION, 
        t.TRAVEL_ID,
        l.LINE_ID, 
        l.START_STATION_ID,
        l.END_STATION_ID,
        trt.TRAIN_TYPE_ID
        FROM LINE l
        INNER JOIN TRAVEL t ON l.LINE_ID = t.LINE_ID
        INNER JOIN TRAVEL_WITH_ET tet ON t.TRAVEL_ID = tet.TRAVEL_ID
        INNER JOIN TRAIN tr ON t.TRAIN_ID = tr.TRAIN_ID
        INNER JOIN TRAIN_TYPE trt ON tr.TRAIN_TYPE_ID = trt.TRAIN_TYPE_ID
        WHERE :station_from IN (SELECT STATION_ID FROM LINE_STOP l2 WHERE l2.LINE_ID = l.LINE_ID)
        AND :station_to IN (SELECT STATION_ID FROM LINE_STOP l2 WHERE l2.LINE_ID = l.LINE_ID AND ORDER_STOP > (SELECT ORDER_STOP FROM LINE_STOP WHERE l2.LINE_ID = LINE_ID AND STATION_ID = :station_from))
        AND l.LINE_ID IN (
            SELECT LINE_ID 
            FROM TRAVEL 
            WHERE TO_CHAR(t.START_TIME,\'DD/MM/YY\') = TO_CHAR(TO_DATE(:date_travel,\'YYYY/MM/DD\'),\'DD/MM/YY\')
            AND ((TO_CHAR(t.START_TIME,\'DD/MM/YYYY\') > TO_CHAR(SYSDATE,\'DD/MM/YY\')) OR (TO_CHAR(t.START_TIME,\'HH24:MI\') > TO_CHAR(SYSDATE,\'HH24:MI\')))) ORDER BY t.START_TIME ASC';
        $args = array(':date_travel' => str_replace('-','/',$date_travel), ':station_from' => $station_from, ':station_to' => $station_to);
        return $this->queryAll($sql, $args);
    }

    public function getEmptySeats($travel_id, $line_id, $start_station_id, $end_station_id)
    {
        $sql = 'SELECT EMPTYSEATS FROM EMPTYSEATATSTOP WHERE TRAVEL_ID = :travel_id AND LINE_ID = :line_id AND START_STATION_ID = :start_station_id AND NEXT_STATION_ID = :end_station_id';
        $args = array(':travel_id' => $travel_id, ':line_id' => $line_id, ':start_station_id' => $start_station_id, ':end_station_id' => $end_station_id);
        return $this->queryRow($sql, $args);
    }

    public function getBusySeats($travel_id, $start_station_id)
    {
        $sql = 'SELECT PLACE_ID FROM TICKET ti
                INNER JOIN TRAVEL tr ON ti.TRAVEL_ID = tr.TRAVEL_ID
                WHERE ti.TRAVEL_ID = :travel_id
                AND (SELECT ORDER_STOP FROM LINE_STOP ls WHERE ls.LINE_ID = tr.LINE_ID AND STATION_ID = :start_station_id) < (SELECT ORDER_STOP FROM LINE_STOP ls WHERE ls.LINE_ID = tr.LINE_ID AND STATION_ID = ti.END_STATION_ID)
        ';
        $args = array(':travel_id' => $travel_id, ':start_station_id' => $start_station_id);
        return $this->queryAll($sql, $args);
    }

    public function getTravelById($travel_id)
    {
        $sql = 'SELECT * from TRAVEL t INNER JOIN LINE l on t.LINE_ID=l.LINE_ID  WHERE TRAVEL_ID = :travel_id';
        $args = array(':travel_id' => $travel_id);
        return $this->queryRow($sql, $args);
    }

    public function getTravelPrice($travel_id)
    {
        $sql = 'SELECT PRICE FROM TRAVEL_PRICE WHERE TRAVEL_ID = :travel_id';
        $args = array(':travel_id' => $travel_id);
        return $this->queryRow($sql, $args);
    }

    public function getTravelTimeDetail($travel_id)
    {
        $sql = 'SELECT ats.station_id, TO_CHAR(arrival_time,\'HH24:MI\') as arrival_time,TO_CHAR(departure_time,\'HH24:MI\') as departure_time from line_stop ls inner join travel t on ls.line_id = t.line_id INNER JOIN ARRIVAL_TO_STATION ats ON ats.travel_id = t.travel_id and ats.station_id = ls.station_id where t.travel_id = :travel_id';
        $args = array(':travel_id' => $travel_id);
        return $this->queryAll($sql, $args);
    }
}