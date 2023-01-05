<?php

require_once(PATH_MODELS . 'TrainDAO.php');
require_once(PATH_MODELS . 'TravelDAO.php');
$train = new TrainDAO();
$travel = new TravelDAO();

$travel_id = intval($_POST['travel']);
$line = intval($_POST['line']);
$from = intval($_POST['from']);
$to = intval($_POST['to']);
$nbr = intval($_POST['nbr']);
$price = intval($_POST['price']);

$places = $travel->getBusySeats($travel_id,$from);

$trainType = $train->getTrainType($travel_id);


if($trainType['TRAIN_TYPE_ID'] < 4){
    $trainType = "TER";
}else if($trainType['TRAIN_TYPE_ID'] == 4){
    $trainType = "TGVDuplex";
}else if($trainType['TRAIN_TYPE_ID'] == 5){
    $trainType = "TGV";
}else{
    $trainType = "problème";
}



require_once(PATH_VIEWS . $page . '.php');
