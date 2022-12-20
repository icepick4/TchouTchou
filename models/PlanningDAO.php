<?php

require_once(PATH_MODELS . 'DAO.php');

/**
 * Class UserDAO
 * 
 */
class PlanningDAO extends DAO
{
    public function getTravelByDriverByDay($driverID, $day)
    {
        $sql = 'SELECT * FROM TRAVEL INNER JOIN TRAVEL_WITH_ET ON TRAVEL.TRAVEL_ID = TRAVEL_WITH_ET.TRAVEL_ID WHERE DRIVER_ID = :driverID AND TO_CHAR(START_TIME,'."'".'D'."'".') = :day';
        $args = array(':driverId' => $driverID, ':day' => $day);
        return $this->queryAll($sql, $args);
    }
}