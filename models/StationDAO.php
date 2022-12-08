<?php

require_once(PATH_MODELS . 'DAO.php');

class StationDAO extends DAO
{
    public function get_hubs($station)
    {
        $sql = 'SELECT DISTINCT TERMINAL_ID 
			FROM PLATFORM
			WHERE STATION_ID = 
			(SELECT STATION_ID FROM STATION WHERE LOWER(STATION_NAME)=LOWER(:station))';
        $args = array(':station' => $station);
        return $this->queryAll($sql, $args);
    }
}
