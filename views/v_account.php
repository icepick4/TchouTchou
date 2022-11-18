<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<!--  Début de la page -->



<?php

if ($_SESSION['logged']) {
?>
    <h1 id="title"><?= WELCOME ?><?php echo $result['USER_FIRSTNAME'] ?></h1>
    <!-- no style on this, getting data for the moment -->
    <div class="content">
        <div class="links">
            <a class="link-profile" href="index.php?page=ticket_list"><?= MY_TICKETS ?></a>
            <a class="link-profile" href="index.php?page=shopping"><?= BUY_TICKET ?></a>
            <a class="link-profile" href="index.php?page=logout"><?= LOGOUT ?> </a>
        </div>
        <div class="infos">
            <table>
                <tr>
                    <td><?= FIRST_NAME ?></td>
                    <td><?php echo $result['USER_FIRSTNAME'] ?></td>
                </tr>
                <tr>
                    <td><?= NAME ?></td>
                    <td><?php echo $result['USER_LASTNAME'] ?></td>
                </tr>
                <tr>
                    <td><?= PHONE ?></td>
                    <td><?php echo $result['USER_PHONE'] ?></td>
                </tr>
                <tr>
                    <td><?= EMAIL ?></td>
                    <td><?php echo $result['USER_MAIL'] ?></td>
                </tr>
            </table>
        </div>
    </div>
<?php

}

?>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
