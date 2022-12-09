<?php

require_once(PATH_MODELS . 'DAO.php');

class StationDAO extends DAO
{
    public function get_hubs($station_id)
    {
        $sql = 'SELECT DISTINCT TERMINAL_ID 
			FROM PLATFORM
			WHERE STATION_ID = 
			(SELECT STATION_ID FROM STATION WHERE STATION_ID=:station_id)';
        $args = array(':station_id' => $station_id);
        return $this->queryAll($sql, $args);
    }

    public function get_stations(){
        $sql = 'SELECT s.STATION_NAME, s.STATION_ID FROM STATION s ';
        $args = array();
        return $this->queryAll($sql, $args);
    }

    public function get_platforms($station_id, $hub_id){
        $sql = 'SELECT *FROM TCHOU.PLATFORM p 
        WHERE p.STATION_ID = :station_id AND p.TERMINAL_ID = :hub_id';
        $args = array(':station_id' => $station_id, ':hub_id' => $hub_id);
        return $this->queryAll($sql, $args);
    }
}
