<?php

require_once(PATH_MODELS . 'DAO.php');

/**
 * Class UserDAO
 * 
 */
class TicketDao extends DAO
{
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

