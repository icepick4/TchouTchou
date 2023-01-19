<?php

require_once(PATH_MODELS . 'DAO.php');

class TravelDAO extends DAO
{
    /**
     * Permet d'obtenir un tableau contenant les informations des voyages à partir de sa date, de la gare de départ et de la gare d'arrivée
     * @param mixed $date_travel
     * @param mixed $station_from
     * @param mixed $station_to
     * @return Array
     */
    public function getTravelsOn($date_travel, $station_from, $station_to)
    {
        $sql = 'SELECT  TO_CHAR(t.START_TIME,\'HH24:MI\') AS START_TIME,
        TO_CHAR(tet.END_TIME,\'HH24:MI\') AS END_TIME,
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
        AND :station_to IN (SELECT STATION_ID FROM LINE_STOP l2 WHERE l2.LINE_ID = l.LINE_ID AND ORDER_STOP > (SELECT ORDER_STOP FROM LINE_STOP WHERE l2.LINE_ID = LINE_ID AND STATION_ID = :station_from))
        AND l.LINE_ID IN (
            SELECT LINE_ID 
            FROM TRAVEL 
            WHERE (TO_CHAR(t.START_TIME,\'DD/MM/YY\') = TO_CHAR(TO_DATE(:date_travel,\'YYYY-MM-DD\'),\'DD/MM/YY\') AND (TO_CHAR(t.START_TIME,\'HH24:MI\') > TO_CHAR(SYSDATE,\'HH24:MI\')))
            OR (TO_CHAR(t.START_TIME,\'DD/MM/YY\') > TO_CHAR(SYSDATE,\'DD/MM/YY\'))) ORDER BY t.START_TIME ASC';
        $args = array(':date_travel' => str_replace('-','/',$date_travel), ':station_from' => $station_from, ':station_to' => $station_to);
        return $this->queryAll($sql, $args);
    }

    /**
     * Permet d'obtenir un tableau contenant tous les sièges vides d'un voyage à partir de son id, de la ligne, de la gare de départ et de la gare d'arrivée
     * @param mixed $travel_id 
     * @param mixed $line_id
     * @param mixed $start_station_id
     * @param mixed $end_station_id
     * @return array
     */
    public function getEmptySeats($travel_id, $line_id, $start_station_id, $end_station_id)
    {
        $sql = 'SELECT EMPTYSEATS FROM EMPTYSEATATSTOP WHERE TRAVEL_ID = :travel_id AND LINE_ID = :line_id AND START_STATION_ID = :start_station_id AND NEXT_STATION_ID = :end_station_id';
        $args = array(':travel_id' => $travel_id, ':line_id' => $line_id, ':start_station_id' => $start_station_id, ':end_station_id' => $end_station_id);
        return $this->queryRow($sql, $args);
    }

    /**
     * Permet d'obtenir un tableau contenant tous les sièges occupés d'un voyage à partir de son id et de la gare de départ
     * @param mixed $travel_id
     * @param mixed $start_station_id
     * @return Array
     */
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

    /**
     * Permet d'obtenir un tableau contenant les informations d'un voyage à partir de son id
     * @param mixed $travel_id
     * @return array
     */
    public function getTravelById($travel_id)
    {
        $sql = 'SELECT * from TRAVEL t INNER JOIN LINE l on t.LINE_ID=l.LINE_ID  WHERE TRAVEL_ID = :travel_id';
        $args = array(':travel_id' => $travel_id);
        return $this->queryRow($sql, $args);
    }

    /**
     * Permets d'obtenir le prix d'un voyage à partir de son id
     * @param mixed $travel_id
     * @return array
     */
    public function getTravelPrice($travel_id)
    {
        $sql = 'SELECT PRICE FROM TRAVEL_PRICE WHERE TRAVEL_ID = :travel_id';
        $args = array(':travel_id' => $travel_id);
        return $this->queryRow($sql, $args);
    }

    /**
     * Permet d'obtenir un tableau contenant les horaires d'un voyage à partir de son id
     * @param mixed $travel_id
     * @return Array
     */
    public function getTravelTimeDetail($travel_id)
    {
        $sql = 'SELECT ats.station_id, TO_CHAR(arrival_time,\'HH24:MI\') as arrival_time,TO_CHAR(departure_time,\'HH24:MI\') as departure_time from line_stop ls inner join travel t on ls.line_id = t.line_id INNER JOIN ARRIVAL_TO_STATION ats ON ats.travel_id = t.travel_id and ats.station_id = ls.station_id where t.travel_id = :travel_id';
        $args = array(':travel_id' => $travel_id);
        return $this->queryAll($sql, $args);
    }

    /**
     * Permet d'obtenir un tableau contenant le retard d'un voyage à partir de son id
     * @param mixed $travel_id
     * @return array
     */
    public function getLateTime($travel_id)
    {
        $sql = 'SELECT LATE_TIME FROM TRAVEL WHERE TRAVEL_ID = :travel_id';
        $args = array(':travel_id' => $travel_id);
        return $this->queryRow($sql, $args);
    }

    /**
     * Permet d'avoir le quai dans lequel le train va arriver dans la station à partir de l'id du train et l'id de la gare
     * @param mixed $train_id
     * @param mixed $station_id
     * @return array
     */
    public function getPlatformAssignedForTravelInStation($train_id, $station_id)
    {
        $sql = 'SELECT PLATFORM_LETTER FROM PLATFORM WHERE PLATFORM_USER = :train_id AND STATION_ID = :station_id';
        $args = array(':train_id' => $train_id, ':station_id' => $station_id);
        return $this->queryRow($sql, $args);
    }

    /**
     * Permet d'obtenir la ligne entre deux stations
     * @param mixed $start_station_id
     * @param mixed $end_station_id
     * @return Array
     */
    public function getLineBetweenTwoPoints($start_station_id, $end_station_id)
    {
        $sql = 'SELECT LINE_ID, ORDER_STOP -2 AS "NBR_STOP" FROM LINE_STOP LS1 WHERE STATION_ID = :end_station AND ORDER_STOP = (SELECT MAX(ORDER_STOP) FROM LINE_STOP LS2 WHERE LS2.LINE_ID = LS1.LINE_ID) AND :start_station = (SELECT STATION_ID FROM LINE_STOP LS3 WHERE LS3.LINE_ID = LS1.LINE_ID AND ORDER_STOP = 1)';
        $args = array(':start_station' => $start_station_id, ':end_station' => $end_station_id);
        return $this->queryAll($sql, $args);
    }

    /**
     * Permet d'obtenir les stations d'une ligne
     * @param mixed $line_id
     * @return Array
     */
    public function getLineStops($line_id)
    {
        $sql = 'SELECT STATION_NAME FROM LINE_STOP  INNER JOIN STATION ON LINE_STOP.STATION_ID = STATION.STATION_ID WHERE LINE_ID = :line_id';
        $args = array(':line_id' => $line_id);
        return $this->queryAll($sql, $args);
    }

    /**
     * Permet d'obtenir le temps de trajet entre deux stations
     * @param mixed $line_id
     * @param mixed $to
     * @param mixed $from
     * @return array
     */
    public function getLineDuration($line_id, $to, $from)
    {
        $sql = 'SELECT getTimeArrival(:line_id,:from_station_id,:to_station_id,1) AS "DURATION" FROM DUAL';
        $args = array(':line_id' => $line_id, ':from_station_id' => $from, ':to_station_id' => $to);
        return $this->queryRow($sql, $args);
    }

    /**
     * Permet d'obtenir le temps de trajet entre deux stations
     * @param mixed $line_id
     * @param mixed $driver_id
     * @param mixed $train_id
     * @param mixed $start_time
     * @return mixed
     */
    public function insertTravel($line_id, $driver_id, $train_id, $start_time)
    {
        $sql = 'INSERT INTO TRAVEL (LINE_ID, DRIVER_ID, TRAIN_ID, START_TIME) VALUES (:line_id, :driver_id, :train_id, TO_DATE(:start_time,\'DD/MM/YY HH24:MI\'))';
        
        $args = array(':line_id' => $line_id, ':driver_id' => $driver_id, ':train_id' => $train_id, ':start_time' => $start_time);
        print_r($args);
        return $this->queryEdit($sql, $args);
    }
}