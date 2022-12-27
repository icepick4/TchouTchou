<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'alert_list.js' ?> type="module" defer></script>


<!--  Début de la page -->

<?php if ($alertList == null) { ?>

    <h1><?= NO_ALERTS ?></h1>

    <?php }else{ ?>

    <div id="selectContainer">
        <div class="selectArrow"><select id="selectType">
            <option value="all"><?= ALL_ALERTS ?></option>
            <?php foreach ($alertTypeList as $alertType) { ?>
                <option value="<?= $alertType['ALERT_TYPE_LABEL'] ?>"><?= $alertType['ALERT_TYPE_LABEL'] ?></option>
            <?php } ?>
        </select></div>
        <button id="resetFilter"><?= RESET_FILTER ?></button>
    </div>
<table>
    <thead>
        <tr>
            <th><?= ALERT_TYPE ?></th>
            <th><?= TRAVEL_ID ?></th>
            <th><?= ALERT_MESSAGE ?></th>
            <th><?= ALERT_DATE ?></th>
        </tr>
    </thead>
    <tbody>

<?php
foreach ($alertList as $alert) {
    ?>
        <tr class="alerts">
            <td><?= $alert['ALERT_TYPE_LABEL'] ?></td>
            <td><?= $alert['TRAVEL_ID'] ?></td>
            <td><?= $alert['ALERT_MESSAGE'] ?></td>
            <td><?= $alert['DATETIME_TRAVEL'] ?></td>
        </tr>
    
    <?php
}

?>
    </tbody>
</table>

<?php } ?>


<?php require_once(PATH_VIEWS . 'footer.php');
