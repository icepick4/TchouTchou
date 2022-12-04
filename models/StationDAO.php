<?php

require_once(PATH_MODELS . 'DAO.php');

class StationDAO extends DAO
{
    public function get_hubs($station)
    {
        $sql = 'SELECT DISTINCT p.TERMINAL_ID 
			FROM TCHOU.PLATFORM p 
			WHERE p.STATION_ID = 
			(SELECT s.STATION_ID FROM TCHOU.STATION s WHERE s.STATION_NAME=:name) ; ';
        $args = array(':name' => $station);
        return $this->queryAll($sql, $args);
    }
}
