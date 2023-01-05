<?php

require_once(PATH_MODELS . 'DAO.php');

/**
 * Class UserDAO
 * 
 */
class TicketDAO extends DAO
{
    /**
     * Function to get all user's tickets
     * @param number $id The user's id
     * @return array The user's tickets
     * 
     */
    public function getTicketsById($id)
    {
        $sql = 'SELECT 
        DISTINCT TK.TRAVEL_ID, 
        (SELECT COUNT(*) 
            FROM TICKET T 
            WHERE T.USER_ID = TK.USER_ID 
            AND T.TRAVEL_ID = TK.TRAVEL_ID 
            AND T.START_STATION_ID = TK.START_STATION_ID 
            AND T.END_STATION_ID = TK.END_STATION_ID) 
        AS "NBR", 
        TK.USER_ID, 
        (SELECT STATION_NAME 
            FROM STATION 
            WHERE STATIOn_ID = START_STATION_ID) 
        AS "START_STATION_NAME", 
        (SELECT STATION_NAME 
            FROM STATION 
            WHERE STATIOn_ID = END_STATION_ID) 
        AS "END_STATION_NAME",
        TO_CHAR(TR.START_TIME,\'DD/MM/YYYY\') AS "DEPARTURE_DATE", 
        TO_CHAR((SELECT DEPARTURE_TIME 
                FROM ARRIVAL_TO_STATION ATS 
                WHERE STATION_ID = TK.START_STATION_ID 
                AND TRAVEl_ID =TK.TRAVEL_ID),\'HH24:MI\')
                AS "DEPARTURE_TIME", 
        TO_CHAR((SELECT ARRIVAL_TIME 
                FROM ARRIVAL_TO_STATION ATS 
                WHERE STATION_ID = TK.END_STATION_ID 
                AND TRAVEl_ID =TK.TRAVEL_ID),\'HH24:MI\') 
                AS "END_TIME" 
        FROM TICKET TK 
        INNER JOIN TRAVEL TR 
        ON TK.TRAVEL_ID = TR.TRAVEL_ID 
        WHERE TK.USER_ID = :id ORDER BY DEPARTURE_TIME';
        $args = array(':id' => $id, );
        return $this->queryAll($sql, $args);
    }

    /**
     * Function to get a ticket by id and user id
     * @param number $id The ticket's id
     * @param number $userId The user's id
     * @return array The ticket's data
     *
     */
    public function getTicketById($travel_id, $user_id)
    {
        $sql = 'SELECT 
        TK.TRAVEL_ID,  
        TK.USER_ID, 
        (SELECT STATION_NAME 
            FROM STATION 
            WHERE STATIOn_ID = START_STATION_ID) 
        AS "START_STATION_NAME", 
        (SELECT STATION_NAME 
            FROM STATION 
            WHERE STATIOn_ID = END_STATION_ID) 
        AS "END_STATION_NAME",
        TO_CHAR(TR.START_TIME,\'MM/DD/YYYY\') AS "DEPARTURE_DATE", 
        TO_CHAR((SELECT DEPARTURE_TIME 
                FROM ARRIVAL_TO_STATION ATS 
                WHERE STATION_ID = TK.START_STATION_ID 
                AND TRAVEl_ID =TK.TRAVEL_ID),\'HH24:MI\')
                AS "DEPARTURE_TIME", 
        TO_CHAR((SELECT ARRIVAL_TIME 
                FROM ARRIVAL_TO_STATION ATS 
                WHERE STATION_ID = TK.END_STATION_ID 
                AND TRAVEl_ID =TK.TRAVEL_ID),\'HH24:MI\') 
                AS "END_TIME",
                PLACE_ID,
                FIRSTNAME,
                LASTNAME
        FROM TICKET TK 
        INNER JOIN TRAVEL TR 
        ON TK.TRAVEL_ID = TR.TRAVEL_ID 
        WHERE TK.USER_ID = :user_id AND TK.TRAVEL_ID = :travel_id';
        $args = array(':travel_id' => $travel_id, ':user_id' => $user_id);
        return $this->queryAll($sql, $args);
    }

    public function addTicket($user_id, $travel_id, $start_station_id, $end_station_id, $place_id, $first_name, $last_name)
    {
        $sql = "INSERT INTO TICKET(USER_ID, TRAVEL_ID, START_STATION_ID, END_STATION_ID, PLACE_ID, FIRSTNAME, LASTNAME) VALUES(:user_id, :travel_id, :start_station_id, :end_station_id, :place_id, :first_name, :last_name)";
        $args = array(':user_id' => $user_id, ':travel_id' => $travel_id, ':start_station_id' => $start_station_id, ':end_station_id' => $end_station_id, ':place_id' => $place_id, ':first_name' => $first_name, ':last_name' => $last_name);
        $this->queryEdit($sql, $args);
    }

    public function deleteTicket($user_id,$travel_id)
    {
        $sql = "DELETE FROM TICKET WHERE TRAVEL_ID = :travel_id AND USER_ID = :user_id";
        $args = array(':user_id' => $user_id, ':travel_id' => $travel_id);
        $this->queryEdit($sql, $args);
    }
}