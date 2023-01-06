<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'planning_driver.js' ?> type="module" defer></script>

<!--  Début de la page -->
<h1>Planning</h1>

<table>
    <thead>
        <tr>
            <th colspan="200"><?= $date['SYSDATE'] ?></th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $i = 0;
    while ($i<24) {
        if($i<10) $i = '0'.$i;
    $result = $planning->getDriverTravelForTheDayByHour($driver, $i);
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

<div id="modal"></div>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
