<?php

require_once(PATH_MODELS . 'TrainDAO.php');
$train = new TrainDAO();

$travel_id = intval($_POST['travel']);
$line = intval($_POST['line']);
$from = intval($_POST['from']);
$to = intval($_POST['to']);
$nbr = intval($_POST['nbr']);
$price = intval($_POST['price']);

$places = $train->getBusySeats($travel_id,$from);

$trainType = $train->getTrainType($travel_id);

if($trainType['TRAIN_TYPE_ID'] < 4){
    header("Location: index.php?page=buy_details&travel=$travel_id&line=$line&from=$from&to=$to&nbr=$nbr");
    die();
}



require_once(PATH_VIEWS . $page . '.php');
