<!DOCTYPE html>
<html>

<body>

    <?php
    chdir("../");
    //pour utiliser le fichier de config de base
    $skipSession = true;
    require_once('./config/configuration.php');
    require_once(PATH_TEXTES . LANG . '.php');
    require_once(PATH_MODELS . 'TravelDAO.php');
    require_once(PATH_MODELS . 'StationDAO.php');

    $travel = new TravelDAO();
    $station = new StationDAO();
    $id = intval($_GET['id']);


    $result = $travel->getTravelById($id);
    $depart = $station->get_station_name($result['START_STATION_ID']);
    $arrivee = $station->get_station_name($result['END_STATION_ID']);


    define('LINE', 'Line');
    define('START_TIME', 'Start time');
    define('LATE_TIME', 'Late time');
    ?>


    <div>
        <h1><?= TRAVEL ?> n° <?= $result['TRAVEL_ID'] ?></h1>
        <p><?= TRAIN ?> n° <?= $result['TRAIN_ID'] ?></p>
        <p><?= START_TIME ?> : <?= $result['START_TIME'] ?></p>
        <p><?= LATE_TIME ?> : <?= $result['LATE_TIME'] ?></p>
        <p><?= START_STATION ?> : <?= $depart['STATION_NAME'] ?></p>
        <p><?= END_STATION ?> : <?= $arrivee['STATION_NAME'] ?></p>
    </div>
    