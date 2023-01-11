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


<table>
    <thead>
        <tr>
            <th colspan="200"><? if(strlen($day)==1){echo "0" . $day;}else{echo $day;}?></th>
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
</table>
<div id="buttonContainer">
    <button id="previousButton" class="btn"><?= PREVIOUS ?></button>
    <button id="nextButton" class="btn"><?= NEXT ?></button>
</div>
    