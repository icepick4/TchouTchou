<?php

require_once(PATH_MODELS . 'DAO.php');

class TrainDAO extends DAO
{

    public function get_stations()
    {
        $sql = 'SELECT CITY_NAME, 
                        (SELECT REGION_NAME FROM REGION R WHERE R.REGION_ID = Ci.REGION_ID AND R.COUNTRY_ID = Ci.COUNTRY_ID) REGION_NAME,
                        (SELECT COUNTRY_NAME FROM COUNTRY Co WHERE Co.COUNTRY_ID = Ci.COUNTRY_ID) COUNTRY_NAME,
        STATION_NAME FROM STATION S, CITY Ci WHERE S.CITY_ID = Ci.CITY_ID';
        $args = array();
        return $this->queryAll($sql, $args);
    }

    public function get_city_name($city_id)
    {
        $sql = 'SELECT CITY_NAME FROM CITY WHERE CITY_ID = :city_id';
        $args = array(':city_id' => $city_id);
        return $this->queryRow($sql, $args);
    }
}
