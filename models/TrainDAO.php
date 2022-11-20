<?php

require_once(PATH_MODELS . 'DAO.php');

class TrainDAO extends DAO
{

    public function get_stations()
    {
        $sql = 'SELECT CITY_NAME, 
                        (SELECT REGION_NAME FROM REGION R WHERE R.REGION_ID = Ci.REGION_ID AND R.COUNTRY_ID = Ci.COUNTRY_ID) REGION_NAME,
                        (SELECT COUNTRY_NAME FROM COUNTRY Co WHERE Co.COUNTRY_ID = Ci.COUNTRY_ID) COUNTRY_NAME,
        STATION_NAME, STATION_ID FROM STATION S, CITY Ci WHERE S.CITY_ID = Ci.CITY_ID';
        $args = array();
        return $this->queryAll($sql, $args);
    }

    public function get_station_departure($id)
    {
        $sql = 'SELECT TRAVEL.LINE_ID, TRAVEL.TRAIN_ID, TRAVEL.LATE_TIME, DEPARTURE_TIME, STATION_NAME AS DESTINATION FROM TRAVEL 
        INNER JOIN LINE_STOP ON TRAVEL.LINE_ID = LINE_STOP.LINE_ID 
        INNER JOIN LINE ON TRAVEL.LINE_ID = LINE.LINE_ID
        INNER JOIN STATION ON LINE.END_STATION_ID = STATION.STATION_ID
        INNER JOIN ARRIVAL_TO_STATION ON TRAVEL.TRAVEL_ID = ARRIVAL_TO_STATION.TRAVEL_ID
        WHERE LINE_STOP.STATION_ID != LINE.END_STATION_ID AND LINE_STOP.STATION_ID = :id AND ARRIVAL_TO_STATION.STATION_ID = :id
        ORDER BY DEPARTURE_TIME DESC';
        $args = array(':id' => $id);
        return $this->queryAll($sql, $args);
    }

    public function get_station_arrivals($id)
    {
        $sql = 'SELECT TRAVEL.LINE_ID, TRAVEL.TRAIN_ID, TRAVEL.LATE_TIME, ARRIVAL_TIME, STATION_NAME AS DESTINATION FROM TRAVEL 
        INNER JOIN LINE_STOP ON TRAVEL.LINE_ID = LINE_STOP.LINE_ID 
        INNER JOIN LINE ON TRAVEL.LINE_ID = LINE.LINE_ID
        INNER JOIN STATION ON LINE.END_STATION_ID = STATION.STATION_ID
        INNER JOIN ARRIVAL_TO_STATION ON TRAVEL.TRAVEL_ID = ARRIVAL_TO_STATION.TRAVEL_ID
        WHERE LINE_STOP.STATION_ID != LINE.START_STATION_ID AND LINE_STOP.STATION_ID = :id AND ARRIVAL_TO_STATION.STATION_ID = :id
        ORDER BY ARRIVAL_TIME DESC';
        $args = array(':id' => $id);
        return $this->queryAll($sql, $args);
    }

    public function get_city_name($city_id)
    {
        $sql = 'SELECT CITY_NAME FROM CITY WHERE CITY_ID = :city_id';
        $args = array(':city_id' => $city_id);
        return $this->queryRow($sql, $args);
    }

    public function get_station_name($station_id)
    {
        $sql = 'SELECT STATION_NAME FROM STATION WHERE STATION_ID = :station_id';
        $args = array(':station_id' => $station_id);
        return $this->queryRow($sql, $args);
    }
}
