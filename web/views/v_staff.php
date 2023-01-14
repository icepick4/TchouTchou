<?php require_once(PATH_VIEWS . 'header.php'); ?>
<script src=<?= PATH_JS . 'staff.js?flag=' . $_SESSION['user_id'] ?> type="module" defer></script>


<!--  Début de la page -->


<?php
if ($staff_list != null) {
?>

    <div class="container">
        <input type="text" id="search" placeholder="<?= SEARCH ?>">

        <i id="clear-search">X</i>
    </div>

    <?php
    
        foreach ($staff_list as $type_title => $staff_splited) {
        ?>

    <h2><?= constant(strtoupper($type_title)) ?></h2>


    <table>
        <tr>
            <th><?= FIRST_NAME ?></th>
            <th><?= NAME ?></th>
            <th COLSPAN=2><?= EMAIL ?></th>
            <th COLSPAN=1><?= DEPARTMENT ?></th>
            <th></th>

        </tr>
        <?php
        foreach ($staff_splited as $staff) {
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
                <td COLSPAN=1>
                    <form method="post" action="index.php?page=staff">
                        <select name="staff_type_update" id="staff_type_update" class="status">
                            <option value="1" <?php if ($staff['EMPLOYEE_CATEGORIE_ID'] == 1) echo 'selected' ?>><?= ADMINISTRATOR ?></option>
                            <option value="2" <?php if ($staff['EMPLOYEE_CATEGORIE_ID'] == 2) echo 'selected' ?>><?= STATION ?></option>
                            <option value="3" <?php if ($staff['EMPLOYEE_CATEGORIE_ID'] == 3) echo 'selected' ?>><?= DRIVER ?></option>
                            <option value="4" <?php if ($staff['EMPLOYEE_CATEGORIE_ID'] == 4) echo 'selected' ?>><?= SERVICE ?></option>
                            <option value="5" <?php if ($staff['EMPLOYEE_CATEGORIE_ID'] == 5) echo 'selected' ?>><?= SUPPORT ?></option>
                            <option value="6" <?php if ($staff['EMPLOYEE_CATEGORIE_ID'] == 6) echo 'selected' ?>><?= RH ?></option>
                        </select>
                        <input type="hidden" id="user_identity_update" name="user_identity_update" value="<?= $staff['USER_ID'] ?>"></input>
                        <input class='links' type="submit" value="OK"></input>
                    </form>
                </td>
                <td>
                    <?php if ($staff['EMPLOYEE_CATEGORIE_ID'] == 3){ ?>
                        <a href="index.php?page=driver_details&user_id=<?= $staff['USER_ID'] ?> " 
                        >
                    <button value=<?= $staff['USER_ID'] ?> class="right-button more-button">...</button>
                </a>
                    <?php }else{ ?>
                    <button value=<?= $staff['USER_ID'] ?> class="right-button fired-button">✖</button>

                    <?php } ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
        }
        ?>

<?php
} ?>
<form method="post" action="index.php?page=staff">
    <fieldset>
        <legend><?= ADD_STAFF ?></legend>
        <div>
            <label for="user_identity"><?= IDENTITY ?></label>
            <select name="user_identity_create" id="user_identity_create" class="user_identity">
                <?php foreach ($user_list_not_employees as $user) { ?>
                    <option value=<?= $user['USER_ID'] ?>><?= $user['USER_FIRSTNAME'] . ' ' . $user['USER_LASTNAME'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="staff_type"><?= TYPE ?></label>
            <select name="staff_type_create" id="staff_type_create" class="staff_type">
                <?php foreach ($staff_type as $staff_type) { ?>
                    <option value=<?= $staff_type['EMPLOYEE_CATEGORIE_ID'] ?>><?= 
                    constant(strtoupper($staff_type['EMPLOYEE_CATEGORIE_LABEL'])) ?></option>
                <?php } ?>
            </select>
        </div>
        <input class='links' type="submit" value=<?= BTN_ADD ?>></input>

</form>




<?php
require_once(PATH_VIEWS . 'go_up.php');
require_once(PATH_VIEWS . 'footer.php');
