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
    <h1 id="title">Bonjour <?php echo $result['USER_FIRSTNAME'] ?></h1>
    <!-- no style on this, getting data for the moment -->
    <div class="content">
        <div class="links">
            <a class="link-profile" href="index.php?page=ticket_list">My tickets</a>
            <a class="link-profile" href="index.php?page=shopping">Get tickets</a>
            <a class="link-profile" href="index.php?page=logout">Logout</a>
        </div>
        <div class="infos">
            <table>
                <tr>
                    <td>First name</td>
                    <td><?php echo $result['USER_FIRSTNAME'] ?></td>
                </tr>
                <tr>
                    <td>Last name</td>
                    <td><?php echo $result['USER_LASTNAME'] ?></td>
                </tr>
                <tr>
                    <td>Phone number</td>
                    <td><?php echo $result['USER_PHONE'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
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
