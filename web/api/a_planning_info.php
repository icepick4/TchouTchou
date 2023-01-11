<!DOCTYPE html>
<html>

<body>

    <?php
    
    require_once(PATH_MODELS . 'TravelDAO.php');
    require_once(PATH_MODELS . 'StationDAO.php');

    $travel = new TravelDAO();
    $station = new StationDAO();
    $id = intval($_GET['id']);


    $result = $travel->getTravelById($id);
    $detail = $travel->getTravelTimeDetail($id);
    $depart = $station->get_station_name($result['START_STATION_ID']);
    $arrivee = $station->get_station_name($result['END_STATION_ID']);


    define('LINE', 'Line');
    define('START_TIME', 'Start time');
    define('LATE_TIME', 'Late time');
    ?>

    <h1><?= TRAVEL ?> n° <?= $result['TRAVEL_ID'] ?></h1>
    <div>
        
        <p><?= TRAIN ?> n° <?= $result['TRAIN_ID'] ?></p>
        <?php foreach ($detail as $value) {
            ?><p><?= $station->get_station_name($value['STATION_ID'])['STATION_NAME'] ?> ● <?= $value['ARRIVAL_TIME'] ?> - <?= $value['DEPARTURE_TIME'] ?></p>
        <?php } ?>
        
    </div>
    