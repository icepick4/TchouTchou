<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>


<!--  Début de la page -->
<h1>Planning</h1>

<table>
    <thead>
        <tr>
            <th colspan="2"><?= $date['SYSDATE'] ?></th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $i = 0;
    while ($i<24) {
    $result = $planning->getDriverTravelForTheDayByHour($driver, $i);
    ?>
        <tr>
            <td><?= $i ?>h</td>
                <?php
        if ($result != null) {
            
            foreach ($result as $travel) {
                ?>
                        <td rowspan=<?= $travel['DURATION'] ?>>
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


<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
