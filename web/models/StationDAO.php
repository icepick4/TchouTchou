<?php

require_once(PATH_MODELS . 'DAO.php');

class StationDAO extends DAO
{   
    /* get lists of hubs from station id */
    public function get_hubs($station_id)
    {
        $sql = 'SELECT DISTINCT TERMINAL_ID 
			FROM TCHOU.PLATFORM
			WHERE STATION_ID = 
			(SELECT STATION_ID FROM TCHOU.STATION WHERE STATION_ID=:station_id)
            ORDER BY TERMINAL_ID ASC';
        $args = array(':station_id' => $station_id);
        return $this->queryAll($sql, $args);
    }

    /* get list of platforms from station id and hub id*/
    public function get_platforms($station_id, $hub_id)
    {
        $sql = 'SELECT * FROM TCHOU.PLATFORM p 
        WHERE p.STATION_ID = :station_id AND p.TERMINAL_ID = :hub_id';
        $args = array(':station_id' => $station_id, ':hub_id' => $hub_id);
        return $this->queryAll($sql, $args);
    }
    
    public function get_stations()
    {
        $sql = 'SELECT CITY_NAME, 
                        (SELECT REGION_NAME FROM REGION R WHERE R.REGION_ID = Ci.REGION_ID AND R.COUNTRY_ID = Ci.COUNTRY_ID) REGION_NAME,
                        (SELECT COUNTRY_NAME FROM COUNTRY Co WHERE Co.COUNTRY_ID = Ci.COUNTRY_ID) COUNTRY_NAME,
        STATION_NAME, STATION_ID FROM STATION S, CITY Ci WHERE S.CITY_ID = Ci.CITY_ID ORDER BY STATION_NAME ASC';
        $args = array();
        return $this->queryAll($sql, $args);
    }

    public function get_station($id)
    {
        $sql = 'SELECT 
        STATION_NAME, STATION_ID FROM STATION S 
        WHERE STATION_ID = :id';
        $args = array(':id' => $id);
        return $this->queryAll($sql, $args);
    }

    public function get_station_from_name($name)
    {
        $sql = 'SELECT 
        STATION_ID FROM STATION S 
        WHERE STATION_NAME = :name';
        $args = array(':name' => $name);
        return $this->queryRow($sql, $args);
    }

    public function get_station_departure($id)
    {
        $sql = 'SELECT TRAVEL.TRAVEL_ID, TRAVEL.LINE_ID, TRAVEL.TRAIN_ID, TRAVEL.LATE_TIME, TO_CHAR(DEPARTURE_TIME+(NVL(TRAVEL.LATE_TIME,0)/1440),\'HH24:MI\') AS DEPARTURE_TIME, STATION_NAME AS DESTINATION FROM TRAVEL 
        INNER JOIN LINE_STOP ON TRAVEL.LINE_ID = LINE_STOP.LINE_ID 
        INNER JOIN LINE ON TRAVEL.LINE_ID = LINE.LINE_ID
        INNER JOIN STATION ON LINE.END_STATION_ID = STATION.STATION_ID
        INNER JOIN ARRIVAL_TO_STATION ON TRAVEL.TRAVEL_ID = ARRIVAL_TO_STATION.TRAVEL_ID
        WHERE LINE_STOP.STATION_ID != LINE.END_STATION_ID 
        AND LINE_STOP.STATION_ID = :id 
        AND ARRIVAL_TO_STATION.STATION_ID = :id
        AND DEPARTURE_TIME +(NVL(TRAVEL.LATE_TIME,0)/1440) >= SYSDATE
        AND DEPARTURE_TIME +(NVL(TRAVEL.LATE_TIME,0)/1440) <= SYSDATE+5/24
        ORDER BY DEPARTURE_TIME ASC';
        $args = array(':id' => $id);
        return $this->queryAll($sql, $args);
    }

    public function get_station_arrivals_days($id,$days)
    {
        $sql = 'SELECT TRAVEL.TRAVEL_ID, TRAVEL.LINE_ID, TRAVEL.TRAIN_ID, TRAVEL.LATE_TIME, TO_CHAR(ARRIVAL_TIME+(NVL(TRAVEL.LATE_TIME,0)/1440),\'HH24:MI\') AS ARRIVAL_TIME, STATION_NAME AS DESTINATION FROM TRAVEL 
        INNER JOIN LINE_STOP ON TRAVEL.LINE_ID = LINE_STOP.LINE_ID 
        INNER JOIN LINE ON TRAVEL.LINE_ID = LINE.LINE_ID
        INNER JOIN STATION ON LINE.START_STATION_ID = STATION.STATION_ID
        INNER JOIN ARRIVAL_TO_STATION ON TRAVEL.TRAVEL_ID = ARRIVAL_TO_STATION.TRAVEL_ID
        WHERE LINE_STOP.STATION_ID != LINE.START_STATION_ID 
        AND LINE_STOP.STATION_ID = :id 
        AND ARRIVAL_TO_STATION.STATION_ID = :id
        AND ARRIVAL_TIME +(NVL(TRAVEL.LATE_TIME,0)/1440) >= SYSDATE
        AND ARRIVAL_TIME +(NVL(TRAVEL.LATE_TIME,0)/1440) <= SYSDATE + :days
        ORDER BY ARRIVAL_TIME ASC';
        $args = array(':id' => $id , ':days' => $days);
        return $this->queryAll($sql, $args);
    }

    public function get_station_arrivals($id)
    {
        return $this->get_station_arrivals_days($id,5/24);
    }

    public function get_station_name($station_id)
    {
        $sql = 'SELECT STATION_NAME FROM STATION WHERE STATION_ID = :station_id';
        $args = array(':station_id' => $station_id);
        return $this->queryRow($sql, $args);
    }

    public function get_platform_used_for_travel($travel_id,$station)
    {
        $sql = 'SELECT PLATFORM_LETTER FROM PLATFORM P INNER JOIN TRAVEL TR ON P.PLATFORM_USER = TR.TRAIN_ID WHERE TR.TRAVEL_ID = :travel_id AND P.STATION_ID = :station';
        $args = array(':travel_id' => $travel_id, ':station' => $station);
        return $this->queryRow($sql, $args);
    }


    /* can not close if occuped*/
    public function set_platform_status($station_id, $hub_id, $platform_letter, $new_status ){
        $sql = 'UPDATE PLATFORM SET PLATFORM_STATUS = :new_status, PLATFORM_UTILISATION = 0, PLATFORM_USER = null WHERE STATION_ID = :station_id
        AND TERMINAL_ID = :hub_id AND PLATFORM_LETTER = :platform_letter
        AND (:new_status = 1 or PLATFORM_UTILISATION = 0)';
        $args = array(':station_id' => $station_id, ':hub_id' => $hub_id, 
            ':platform_letter' => $platform_letter, ':new_status' => $new_status);
        $this->queryEdit($sql, $args);
    }

    public function set_platform_status_open($station_id, $hub_id, $platform_letter){
        $new_status = 1;
        $this->set_platform_status($station_id, $hub_id, $platform_letter, $new_status);
    }

    public function set_platform_status_close($station_id, $hub_id, $platform_letter){
        $new_status = 0;
        $this->set_platform_status($station_id, $hub_id, $platform_letter, $new_status);
    }

    public function get_station_departure_date_for_travel($travel_id, $station_id)
    {
        $sql = 'SELECT TO_CHAR(DEPARTURE_TIME,\'MM/DD/YYYY\') AS DEPARTURE_DATE FROM ARRIVAL_TO_STATION WHERE TRAVEL_ID = :travel_id AND STATION_ID = :station_id';
        $args = array(':travel_id' => $travel_id, ':station_id' => $station_id);
        return $this->queryRow($sql, $args);
    }
    public function get_station_departure_for_travel($travel_id, $station_id)
    {
        $sql = 'SELECT TO_CHAR(DEPARTURE_TIME,\'HH24:MI\') AS DEPARTURE_TIME FROM ARRIVAL_TO_STATION WHERE TRAVEL_ID = :travel_id AND STATION_ID = :station_id';
        $args = array(':travel_id' => $travel_id, ':station_id' => $station_id);
        return $this->queryRow($sql, $args);
    }

    public function get_station_arrival_for_travel($travel_id, $station_id)
    {
        $sql = 'SELECT TO_CHAR(ARRIVAL_TIME,\'HH24:MI\') AS ARRIVAL_TIME FROM ARRIVAL_TO_STATION WHERE TRAVEL_ID = :travel_id AND STATION_ID = :station_id';
        $args = array(':travel_id' => $travel_id, ':station_id' => $station_id);
        return $this->queryRow($sql, $args);
    }

    public function get_station_arrivals_with_platform($id,$days)
    {
        $sql = 'SELECT TRAVEL_ID, LINE_ID, TRAIN_ID, LATE_TIME, ARRIVAL_TIME, ORIGIN, PLATFORM from INCOMING_TRAIN_WITH_PLATFORM
            where 
            STATION_ID = :id
            AND ARRIVAL_TIME+(NVL(LATE_TIME,0)/1440)  >= SYSDATE
            AND ARRIVAL_TIME+(NVL(LATE_TIME,0)/1440)  <= SYSDATE + :days
            ORDER BY ARRIVAL_TIME+(NVL(LATE_TIME,0)/1440) DESC NULLS LAST';
        $args = array(':id' => $id , ':days' => $days);
        return $this->queryAll($sql, $args);
    }

    public function get_available_platform($id,$hub){
        $sql = 'SELECT PLATFORM_LETTER  FROM TCHOU.PLATFORM p 
        WHERE 
        STATION_ID = :id 
        AND TERMINAL_ID = :hub
        AND PLATFORM_UTILISATION = 0 
        AND PLATFORM_STATUS = 1 
        AND PLATFORM_USER IS NULL';

        $args = array(':id' => $id , ':hub' => $hub);
        return $this->queryAll($sql, $args);
    }

    public function clear_platform_of_user($station_id,$hub_id,
        $user_id){
        $sql = 'UPDATE PLATFORM SET PLATFORM_USER = NULL WHERE STATION_ID = :station_id
        AND TERMINAL_ID = :hub_id 
        AND PLATFORM_USER = :user_id
        AND  PLATFORM_UTILISATION = 0';
        $args = array(':station_id' => $station_id, ':hub_id' => $hub_id, 
             ':user_id' => $user_id);
        $this->queryEdit($sql, $args);
    }

    public function set_platform_user($station_id,$hub_id,
        $platform_letter,$user_id){
        $sql = 'UPDATE PLATFORM p SET PLATFORM_USER = :user_id  
        WHERE STATION_ID = :station_id
        AND TERMINAL_ID = :hub_id AND PLATFORM_LETTER = :platform_letter
        AND  PLATFORM_UTILISATION = 0 AND  PLATFORM_STATUS = 1
        AND PLATFORM_USER IS NULL
        AND :user_id NOT IN 
        (SELECT DISTINCT PLATFORM_USER 
            FROM tchou.PLATFORM WHERE 
        STATION_ID = p.STATION_ID 
        AND TERMINAL_ID = p.TERMINAL_ID
        AND PLATFORM_USER IS NOT NULL)';
        $args = array(':station_id' => $station_id, ':hub_id' => $hub_id, 
            ':platform_letter' => $platform_letter, ':user_id' => $user_id);
        $this->queryEdit($sql, $args);
    }



}
