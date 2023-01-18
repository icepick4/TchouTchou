<!DOCTYPE html>
<html>

<body>

    <?php
    
    require_once(PATH_MODELS . 'TravelDAO.php');
    require_once(PATH_MODELS . 'StationDAO.php');
    require_once(PATH_MODELS . 'StaffDAO.php');

    $travel = new TravelDAO();
    $station = new StationDAO();
    $staff = new StaffDAO();

    $fromName = $_GET['from'];
    $from = $station->get_station_from_name($fromName)['STATION_ID'];

    $toName = $_GET['to'];
    $to = $station->get_station_from_name($toName)['STATION_ID'];

    $date = $_GET['date'];

    echo $date;

    $lines = $travel->getLineBetweenTwoPoints($from, $to);
    

?>
    
<?php foreach ($lines as $line) { 
    
    $time = $travel->getLineTime($line['LINE_ID'])['DURATION']; 
    $freeDriver = $staff->getFreeDriver($time,$date) ?>
    <div>
        <p>Line: <?= $line['LINE_ID'] ?></p>
        <p>station id: <?= $line['STATION_ID'] ?></p>
        <p>order stop: <?= $line['ORDER_STOP'] ?></p>
        <p>duration time: <?= $line['DURATION_TIME'] ?></p>
        <p>line time: <?= $time ?></p>
        <? foreach ($freeDriver as $driver) { ?>
            <p>free driver: <?= $driver['STAFF_ID'] ?></p>
        <? } ?>
       <? print_r($line); ?>
    </div>

<?php } ?>
    