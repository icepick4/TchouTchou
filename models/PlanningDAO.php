<?php

require_once(PATH_MODELS . 'DAO.php');

/**
 * Class UserDAO
 * 
 */
class PlanningDAO extends DAO
{
    public function getSysdate()
    {
        $sql = 'SELECT SYSDATE FROM DUAL';
        return $this->queryRow($sql);
    }
    public function getDriverTravelForTheDayByHour($driverID,$hour)
    {
        $sql = 'SELECT TRAVEL.TRAVEL_ID, TRAVEL.LINE_ID, TRAVEL.TRAIN_ID, TRAVEL.DRIVER_ID, START_TIME, END_TIME,TIME_MIN,TRUNC(TIME_MIN/60+1,0) AS "DURATION"
                FROM TRAVEL
                INNER JOIN TRAVEL_WITH_ET ON TRAVEL.TRAVEL_ID = TRAVEL_WITH_ET.TRAVEL_ID 
                WHERE DRIVER_ID = :driverID
                AND TO_CHAR(START_TIME,'."'".'HH24'."'".') = :hour 
                AND TO_CHAR(START_TIME,'."'".'D'."'".') = TO_CHAR(SYSDATE,'."'".'D'."'".')';
        $args = array(':driverId' => $driverID, ':hour' => $hour);
        return $this->queryAll($sql, $args);
    }
}