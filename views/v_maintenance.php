<?php require_once(PATH_VIEWS . 'header.php'); ?>
<script src=<?= PATH_JS . 'maintenance.js' ?> type="module" defer></script>


<!--  Début de la page -->


<?php
if ($trains != null) {
?>

    <div class="container">
        <input type="text" id="search" placeholder="<?= SEARCH ?>">

        <i id="clear-search">X</i>
    </div>


    <table>
        <tr>
            <th><?= TRAIN_ID ?></th>
            <th><?= TRAIN_TYPE ?></th>
            <th><?= TRAIN_CAPACITY ?></th>
            <th><?= TRAIN_SPEED ?></th>
            <th><?= TRAIN_LENGTH ?></th>
            <th><?= TRAIN_STATUS ?></th>
        </tr>
        <?php
        foreach ($trains as $train) {
        ?>
            <tr>
                <td>
                    <h3><?php echo $train['TRAIN_ID'] ?></h3>
                </td>
                <td>
                    <h3><?php echo $train['TRAIN_TYPE_LABEL'] ?></h3>
                </td>
                <td>
                    <h3><?php echo $train['TRAIN_CAPACITY'] ?></h3>
                </td>
                <td>
                    <h3><?php echo $train['TRAIN_SPEED'] ?></h3>
                </td>
                <td>
                    <h3><?php echo $train['TRAIN_LENGTH'].' m' ?></h3>
                </td>
                <td>
                    
                    <?php if ($train['TRAIN_STATUS_ID'] == 0) { ?>
                        <h3><?= TRAIN_FREE ?></h3>
                    <?php } elseif ($train['TRAIN_STATUS_ID'] == 1) { ?>
                        <h3><?= TRAIN_USE ?></h3>
                    <?php } else { ?>
                        <h3><?= TRAIN_MAINTENANCE ?></h3>
                    <?php } ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}?>







<?php require_once(PATH_VIEWS . 'footer.php');