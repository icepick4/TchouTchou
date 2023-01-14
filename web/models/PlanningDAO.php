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
        $sql = 'SELECT TO_CHAR(SYSDATE,\'DD/MM/YYYY\') AS "DATE" FROM DUAL';
        return $this->queryRow($sql);
    }
    public function getDriverTravelForTheDayByHour($driverID,$hour,$day)
    {
        $sql = 'SELECT TRAVEL.TRAVEL_ID, TRAVEL.LINE_ID, TRAVEL.TRAIN_ID, TRAVEL.DRIVER_ID, TRAVEL.START_TIME, TRAVEL_WITH_ET.END_TIME, TRAVEL_WITH_ET.TIME_MIN,TRUNC(TIME_MIN/60+1,0) AS "DURATION"
                FROM TRAVEL
                INNER JOIN TRAVEL_WITH_ET ON TRAVEL.TRAVEL_ID = TRAVEL_WITH_ET.TRAVEL_ID 
                WHERE TRAVEL.DRIVER_ID = :driverID
                AND TO_CHAR(TRAVEL.START_TIME,'."'".'HH24'."'".') = :hour 
                AND TO_CHAR(TRAVEL.START_TIME,\'DD/MM/YYYY\') = :day
                AND TO_CHAR(TRAVEL.START_TIME,'."'".'MM'."'".') = TO_CHAR(SYSDATE,'."'".'MM'."'".')';
        $args = array(':driverID' => $driverID, ':hour' => $hour, ':day' => $day);
        return $this->queryAll($sql, $args);
    }
}