<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'alert_list.js' ?> type="module" defer></script>


<!--  Début de la page -->

<?php if ($alertList == null) { ?>

    <h1><?= NO_ALERTS ?></h1>

<?php } else { ?>

    <div id="selectContainer">
        <div class="selectArrow"><select id="selectType">
                <option value="all"><?= ALL_TYPES_ALERTS ?></option>
                <?php foreach ($alertTypeList as $alertType) { ?>
                    <option value="<?= $alertType['ALERT_TYPE_LABEL'] ?>"><?= $alertType['ALERT_TYPE_LABEL'] ?></option>
                <?php } ?>
            </select></div>
        <? if (isset($_GET['showAll'])) { ?>
            <div class="selectArrow"><select id="selectStatus">
                    <option value="all"><?= ALL_STATUS_TRAVELS ?></option>
                    <option value="<?= FINISHED_ALERTS ?>"><?= FINISHED_ALERTS ?></option>
                    <option value="<?= CURRENT_ALERTS ?>"><?= CURRENT_ALERTS ?></option>
                </select></div>
        <? } ?>

        <button id="resetFilter"><?= RESET_FILTER ?></button>
    </div>
    <table>
        <thead>
            <tr>
                <th><?= ALERT_TYPE ?></th>
                <th><?= TRAVEL_ID ?></th>
                <th><?= ALERT_MESSAGE ?></th>
                <th><?= ALERT_DATE ?></th>
                <? if (isset($_GET['showAll'])) { ?>
                    <th><?= ALERT_STATUS ?></th>
                <? } ?>
            </tr>
        </thead>
        <tbody>

<?php
foreach ($alertList as $alert) {
    ?>
        <?php 
            if ($alert['ALERT_TYPE_ID'] <10)
            {
                ?>
                <tr class="alerts" onclick="document.location.href='<?php
                    echo 'index.php?page=alert_single&id='.$alert['TRAVEL_ID'].'0'.$alert['ALERT_TYPE_ID'].substr($alert['DATETIME_TRAVEL'],-5,2).substr($alert['DATETIME_TRAVEL'],-2,2)."'"?>">
            <?php } else {?>
                <tr class="alerts" onclick="document.location.href='<?='index.php?page=alert_single&id='.$alert['TRAVEL_ID'].$alert['ALERT_TYPE_ID'].substr($alert['DATETIME_TRAVEL'],-5,2).substr($alert['DATETIME_TRAVEL'],-2,2)."'"?>">
            <?php
            foreach ($alertList as $alert) {
            ?>
                <?php
                if ($alert['ALERT_TYPE_ID'] < 10) {

                ?><script>
                        console.log("<?= 'index.php?page=alert_single&id=' . $alert['TRAVEL_ID'] . '0' . $alert['ALERT_TYPE_ID'] . substr($alert['DATETIME_TRAVEL'], -5, 2) . substr($alert['DATETIME_TRAVEL'], -2, 2) ?>");
                    </script>
                    <tr class="alerts" onclick="document.location.href=<?= 'index.php?page=alert_single&id=' . $alert['TRAVEL_ID'] . '0' . $alert['ALERT_TYPE_ID'] . substr($alert['DATETIME_TRAVEL'], -5, 2) . substr($alert['DATETIME_TRAVEL'], -2, 2) ?>">
                    <?php } else { ?>
                    <tr class="alerts" onclick="document.location.href=<?= 'index.php?page=alert_single&id=' . $alert['TRAVEL_ID'] . $alert['ALERT_TYPE_ID'] . substr($alert['DATETIME_TRAVEL'], -5, 2) . substr($alert['DATETIME_TRAVEL'], -2, 2) ?>">
                    <?php
                }
                    ?>
                    <td><?= $alert['ALERT_TYPE_LABEL'] ?></td>
                    <td><?= $alert['TRAVEL_ID'] ?></td>
                    <td><?= $alert['ALERT_MESSAGE'] ?></td>
                    <td><?= $alert['DATETIME_TRAVEL'] ?></td>
                    <?php if (isset($_GET['showAll'])) { ?>
                        <td><? if ($alert['ALERT_STATUS'] == 0) {
                                echo FINISHED_ALERTS;
                            } else {
                                echo CURRENT_ALERTS;
                            } ?></td>
                    <? } ?>
                    </tr>

                <?php
            }
        }
                ?>
        </tbody>
    </table>


<?php } ?>

<?php if (!isset($_GET['showAll'])) { ?>
    <a id="buttonAllAlert" href="index.php?page=alert_list&showAll=true"><?= SHOW_ALL_ALERTS ?></a>
<?php } ?>

<?php require_once(PATH_VIEWS . 'footer.php');