<?php

require_once(PATH_MODELS . 'DAO.php');

class TrainDAO extends DAO
{
    public function get_trains()
    {
        $sql = 'SELECT * FROM TRAIN INNER JOIN TRAIN_TYPE ON TRAIN.TRAIN_TYPE_ID = TRAIN_TYPE.TRAIN_TYPE_ID INNER JOIN TRAIN_STATUS ON TRAIN.TRAIN_STATUS_ID = TRAIN_STATUS.TRAIN_STATUS_ID ORDER BY TRAIN_ID ASC';
        $args = array();
        return $this->queryAll($sql, $args);
    }

    public function update_train_status($status, $train_id)
    {
        $sql = 'UPDATE TRAIN SET TRAIN_STATUS_ID = :status WHERE TRAIN_ID = :train_id';
        $args = array(':status' => $status, ':train_id' => $train_id);
        $this->queryEdit($sql, $args);
    }

    public function get_lines_on($date_travel, $station_from, $station_to)
    {
        $sql = 'SELECT t.PRICE, t.START_TIME, t.TRAVEL_ID FROM LINE l, TRAVEL t WHERE l.START_STATION_ID = :station_from AND l.END_STATION_ID = :station_to AND l.LINE_ID IN (SELECT LINE_ID FROM TRAVEL WHERE START_TIME > :date_travel AND :date_travel < START_TIME + 1)';
        $args = array(':date_travel' => $date_travel, ':station_from' => $station_from, ':station_to' => $station_to);
        return $this->queryAll($sql, $args);
    }

    public function get_all_trains_type()
    {
        $sql = 'SELECT * FROM TRAIN_TYPE';
        $args = array();
        return $this->queryAll($sql, $args);
    }

    public function get_all_trains_status()
    {
        $sql = 'SELECT * FROM TRAIN_STATUS';
        $args = array();
        return $this->queryAll($sql, $args);
    }

    public function add_train($train_type)
    {
        $sql = 'INSERT INTO TRAIN (TRAIN_ID,TRAIN_TYPE_ID, TRAIN_STATUS_ID) VALUES ((SELECT MAX(TRAIN_ID) FROM TRAIN) +1,:train_type, 0)';
        $args = array(':train_type' => $train_type);
        $this->queryEdit($sql, $args);
    }
}
