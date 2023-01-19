<!DOCTYPE html>
<html>

<body>

    <?php
    
    
    require_once(PATH_MODELS . 'travelDAO.php');


    $travel = new travelDAO();

    $train_id = $_GET['train_id'];
    $datetime = $_GET['datetime'];
    $driver_id = $_GET['driver_id'];
    $line_id = $_GET['line_id'];
    
    $travel->insertTravel($line_id, $driver_id, $train_id, $datetime);