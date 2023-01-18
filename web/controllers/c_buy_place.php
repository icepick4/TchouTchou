<?php

if($_SESSION['logged'] == false){
    header('Location: index.php?page=login');
    exit();
}

if(!isset($_POST['price']) || !isset($_POST['nbr']) || !isset($_POST['travel']) || !isset($_POST['line']) || !isset($_POST['from']) || !isset($_POST['to'])){
    header('Location: index.php?page=buy');
    exit();
}

require_once(PATH_MODELS . 'TrainDAO.php');
require_once(PATH_MODELS . 'TravelDAO.php');
$train = new TrainDAO();
$travel = new TravelDAO();

$travel_id = intval($_POST['travel']);
$line = intval($_POST['line']);
$from = intval($_POST['from']);
$to = intval($_POST['to']);
$nbr = intval($_POST['nbr']);
$price = floatval($_POST['price']);
$date = $_POST['date'];

$exist = false;
$trains = $travel->getTravelsOn($date, $from, $to);
    for ($i = 0; $i < count($trains); $i++) {
        $trains[$i]['PRICE'] = $travel->getTravelPrice($trains[$i]['TRAVEL_ID'])['PRICE'];
        $trains[$i]['DURATION'] = minToHourMin($trains[$i]['DURATION']);
        $trains[$i]['EMPTY_SEATS'] = $travel->getEmptySeats($trains[$i]['TRAVEL_ID'], $trains[$i]['LINE_ID'], $trains[$i]['START_STATION_ID'], $trains[$i]['END_STATION_ID']);
    }

    for($i = 0; $i < count($trains); $i++){
        if($trains[$i]['TRAVEL_ID'] == $travel_id){
            $exist = true;
            
            if($trains[$i]['EMPTY_SEATS']["EMPTYSEATS"] < $nbr){
                $exist = false;
            }
            
            if($trains[$i]['PRICE']*$nbr != $price){
                $exist = false;
            }
           
            if($trains[$i]['LINE_ID'] != $line){
                $exist = false;
            }
        }
        if($exist){
            break;
        }
    }
    





$places = $travel->getBusySeats($travel_id,$from);

$trainType = $train->getTrainType($travel_id);


if($trainType['TRAIN_TYPE_ID'] < 4){
    $trainType = "TER";
}else if($trainType['TRAIN_TYPE_ID'] == 4){
    $trainType = "TGVDuplex";
}else if($trainType['TRAIN_TYPE_ID'] == 5){
    $trainType = "TGV";
}else if($trainType['TRAIN_TYPE_ID'] == 6){
    $trainType = "TGVNOL";
}else{
    $trainType = "problème";
}



require_once(PATH_VIEWS . $page . '.php');
