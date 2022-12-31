<?php

require_once(PATH_MODELS . 'TrainDAO.php');
$train = new TrainDAO();

$travel_id = intval($_GET['travel']);
$line = intval($_GET['line']);
$from = intval($_GET['from']);
$to = intval($_GET['to']);
$nbr = intval($_GET['nbr']);


$places = $train->getBusySeats($travel_id,$from);

$trainType = $train->getTrainType($travel_id);

if($trainType['TRAIN_TYPE_ID'] < 4){
    header("Location: index.php?page=buy_details&travel=$travel_id&line=$line&from=$from&to=$to&nbr=$nbr");
    die();
}



require_once(PATH_VIEWS . $page . '.php');
