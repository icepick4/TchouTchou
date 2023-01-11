<!DOCTYPE html>
<html>

<body>

    <?php
    
    require_once(PATH_MODELS . 'PlanningDAO.php');

    $planning = new PlanningDAO();
    $day = intval($_GET['day']);
    $driver = intval($_GET['driverID']);



    $date = $planning->getSysdate();

    ?>



    <thead>
        <tr>
            <th colspan="200"><?= $day?></th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $i = 0;
    while ($i<24) {
        if($i<10) $i = '0'.$i;
    $result = $planning->getDriverTravelForTheDayByHour($driver, $i, $day);
    ?>
        <tr>
            <td><?= $i ?>h</td>
                <?php
        if ($result != null) {
            
            foreach ($result as $travel) {
                ?>
                        <td class="travel"  rowspan=<?= $travel['DURATION'] ?> value="<?= $travel['TRAVEL_ID'] ?>">
                        <?php
                echo TRAVEL.' n° '.$travel['TRAVEL_ID'];
            }
        }
                ?>
            </td>
        </tr>
        <?php
        $i++;};
        ?>
    </tbody>

    