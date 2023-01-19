<!DOCTYPE html>
<html>

<body>

    <?php
    
    
    require_once(PATH_MODELS . 'travelDAO.php');


    $travel = new travelDAO();

    $train_id = $_GET['train_id'];
    $datetime = $_GET['datetime'];
    $driver_id = $_GET['driver_id'];
    $travel_id = $_GET['travel_id'];
    
    $travel->//méthode insert dao ici