<?php

    require_once(PATH_VIEWS . 'header.php');
    require_once(PATH_MODELS . 'Function.php');
?>
<button onclick="document.location.href='index.php?page=station_list'"><?= RETURN_BUTTON ?></button>
<h1><?= STATION_OF.$station_name['STATION_NAME'] ?></h1>
<? 
    if (!$departTravels && !$arrivalTravels) {
?>
    <h2><?= NO_TRAIN ?></h2>
<?php
    }else{
    if ($departTravels){ ?>
        <h2> <?= DEPARTURES ?> </h2>
        <table>
        <tr>
            <th><?= TRAIN_NUMBER ?></th>
            <th><?= DEPARTURE_TIME ?></th>
            <th><?= DESTINATION ?></th>
        <?php

            foreach ($departTravels as $travel) {
        ?>
                <tr>
                    <td><h3><?= $travel['TRAIN_ID'] ?></h3></td>
                    <td><h3><?=  strTo24Time($travel['DEPARTURE_TIME']) ?></h3></td>
                    <td><h3><?= $travel['DESTINATION']?></h3></td>
                <tr>
        <?php
            }
            ?>
        </table>
    <?}else{?>
        <h2><?= NO_DEPARTURE ?>
    <?php }; if ($arrivalTravels){ ?>
        <h2> <?= ARRIVALS ?> </h2>
        <table>
        <tr>
            <th><?= TRAIN_NUMBER ?></th>
            <th><?= ARRIVAL_TIME ?></th>
            <th><?= DESTINATION ?></th>
        </tr>
        <?php
        foreach ($arrivalTravels as $travel) {
        ?>
            <tr>
                <td><h3><?= $travel['TRAIN_ID'] ?></h3></td>
                <td><h3><?= strTo24Time($travel['ARRIVAL_TIME']) ?></h3></td>
                <td><h3><?= $travel['DESTINATION']?></h3></td>
            <tr>
        <?php
        }
        ?></table><?php
        }else{?><h2><?= NO_ARRIVAL ?></h2><?php }}?>
 </section>
 <? require_once(PATH_VIEWS . 'footer.php');