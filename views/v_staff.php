<?php require_once(PATH_VIEWS . 'header.php'); ?>
<script src=<?= PATH_JS . 'maintenance.js' ?> type="module" defer></script>


<!--  Début de la page -->


<?php
if ($staff_list != null) {
?>
    
    <div class="container">
        <input type="text" id="search" placeholder="<?= SEARCH ?>">

        <i id="clear-search">X</i>
    </div>


    <table>
        <tr>
            <th><?= FIRST_NAME ?></th>
            <th><?= NAME ?></th>
            <th COLSPAN=2><?= EMAIL ?></th>
            <th COLSPAN=2><?= DEPARTMENT ?></th>

        </tr>
        <?php
        foreach ($staff_list as $staff) {
        ?>
            <tr>
                <td>
                    <h3><?= $staff['USER_FIRSTNAME'] ?></h3>
                </td>
                <td>
                    <h3><?= $staff['USER_LASTNAME'] ?></h3>
                </td>
                <td COLSPAN=2>
                    <h3><?= $staff['USER_MAIL'] ?></h3>
                </td>
                <td COLSPAN=2>
                    <form method="post" action="index.php?page=maintenance">
                        <select name="status" id="status" class="status">
                            <option value="1" <?php if ($staff['EMPLOYEE_CATEGORIE_ID'] == 1) echo 'selected' ?>><?= ADMINISTRATOR ?></option>
                            <option value="2" <?php if ($staff['EMPLOYEE_CATEGORIE_ID'] == 2) echo 'selected' ?>><?= STATION ?></option>
                            <option value="3" <?php if ($staff['EMPLOYEE_CATEGORIE_ID'] == 3) echo 'selected' ?>><?= DRIVER ?></option>
                            <option value="4" <?php if ($staff['EMPLOYEE_CATEGORIE_ID'] == 4) echo 'selected' ?>><?= SERVICE ?></option>
                            <option value="55" <?php if ($staff['EMPLOYEE_CATEGORIE_ID'] == 5) echo 'selected' ?>><?= SUPPORT ?></option>
                        </select>
                        <input type="text" id="train_id" name="train_id" value="<?= $staff['USER_ID'] ?> " style="display:none;" ></input>
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
<form method="post" action="index.php?page=staff">
<fieldset>
    <legend><?= ADD_STAFF?></legend>
    <label for="user_identity"><?= IDENTITY ?></label>
    <select name="user_identity" id="user_identity" class="user_identity">
    <?php foreach ($user_list_not_employees as $user) { ?>
                            <option value=<?=$user['USER_ID']?>><?=  $user['USER_FIRSTNAME'].' '.$user['USER_LASTNAME'] ?></option>
                        <?php } ?>
    </select>
    <label for="staff_type"><?= TYPE ?></label>
    <select name="staff_type" id="staff_type" class="staff_type">
    <?php foreach ($staff_type as $staff_type) { ?>
                            <option value=<?=$staff_type['EMPLOYEE_CATEGORIE_ID']?>><?=  $staff_type['EMPLOYEE_CATEGORIE_LABEL'] ?></option>
                        <?php } ?>
    </select>
    <input class='links' type="submit" value=<?= BTN_ADD ?>></input>

    </form>




<?php require_once(PATH_VIEWS . 'footer.php');