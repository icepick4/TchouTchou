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
            <th COLSPAN=2><?= TRAIN_STATUS ?></th>

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
                <td COLSPAN=2>
                    <form method="post" action="index.php?page=maintenance">
                        <select name="status" id="status" class="status">
                            <option value="0" <?php if ($train['TRAIN_STATUS_ID'] == 0) echo 'selected' ?>><?= TRAIN_FREE ?></option>
                            <option value="1" <?php if ($train['TRAIN_STATUS_ID'] == 1) echo 'selected' ?>><?= TRAIN_USE ?></option>
                            <option value="2" <?php if ($train['TRAIN_STATUS_ID'] == 2) echo 'selected' ?>><?= TRAIN_MAINTENANCE ?></option>
                        </select>
                        <input type="text" id="train_id" name="train_id" value="<?= $train['TRAIN_ID'] ?> " style="display:none;" ></input>
                        <input class='links' type="submit" value=<?= SUBMIT ?>></input>
                    </form>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>
    
<?php
}?>
<button onclick="document.location.href='index.php?page=train_adding'"><?= BTN_ADD ?></button>






<?php require_once(PATH_VIEWS . 'footer.php');