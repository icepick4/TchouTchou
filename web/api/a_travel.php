<!DOCTYPE html>
<html>
<script src=<?= PATH_JS . 'travel_line.js' ?> type="module" defer></script>
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

    $lines = $travel->getLineBetweenTwoPoints($from, $to);
    

?>
<table>
    <tr>
        <th><?= HEADER_LINE ?></th>
        <th><?= HEADER_STOPS ?></th>
        <th><?= HEADER_DETAILS ?></th>
        <th><?= HEADER_DURATION ?></th>
        <th></th>
    </tr>
<?php foreach ($lines as $line) { 
    $stops = $travel->getLineStops($line['LINE_ID']);
    $duration = $travel->getLineDuration($line['LINE_ID'],$to,$from)['DURATION'];
    ?>
    <tr>
        <td><?= $line['LINE_ID'] ?></td>
        <td><?= $line['NBR_STOP'] ?></td>
        <td><?php foreach ($stops as $stop) {
            if ($stop != end($stops)) {
                echo $stop['STATION_NAME'] . ' - ';
            } else {
                echo $stop['STATION_NAME'];};}?></td>
        <td class="time" value=<?= $duration?>><?= minToHourMin($duration) ?></td>
        <td><input type="radio" name="line_id" value="<?= $line['LINE_ID'] ?>"></td>
       </tr>

<?php } ?>
</table>