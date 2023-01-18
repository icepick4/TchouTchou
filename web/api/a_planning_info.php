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
        <p><?= TRAIN ?> n° <span><?= $result['TRAIN_ID'] ?></span></p>
        <?php foreach ($detail as $value) {
            $platform = $travel->getPlatformAssignedForTravelInStation($result['TRAIN_ID'],$value['STATION_ID'])['PLATFORM_LETTER'];
            if ($value == $detail[0]) {
                ?><p>● <?= $station->get_station_name($value['STATION_ID'])['STATION_NAME'].' '.$value['DEPARTURE_TIME']; if (isset($platform)){?> - Voie <span><?php echo $platform; ?></span><?php }?></p>
            <?php } elseif ($value == end($detail)) {
                ?><p>● <?= $station->get_station_name($value['STATION_ID'])['STATION_NAME'].' '.$value['ARRIVAL_TIME']; if (isset($platform)){?> - Voie <span><?php echo $platform; ?></span><?php }?></p>
            <?php } else {
                ?><p>● <?= $station->get_station_name($value['STATION_ID'])['STATION_NAME'] . ' ' . $value['ARRIVAL_TIME'] ?> - <?= $value['DEPARTURE_TIME']; if (isset($platform)){?> - Voie <span><?php echo $platform; ?></span><?php }?></p>
            <?php } if ($value != end($detail)) { ?>
                <div></div>
        <?php }} ?>
        
    </div>
    