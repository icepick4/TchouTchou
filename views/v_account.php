<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<!--  Début de la page -->



<?php

if ($_SESSION['logged']) {
    echo 'Bonjour ' . $result['USER_FIRSTNAME'];
?>
    <!-- no style on this, getting data for the moment -->
    <div class="links">
        <a class="link-profile" href="index.php?page=ticket_list">My tickets</a>
        <a class="link-profile" href="index.php?page=shopping">Get tickets</a>
        <a class="link-profile" href="index.php?page=logout">Logout</a>
    </div>
    <p>Last name : <?php echo $result['USER_LASTNAME'] ?></p>
    <p>First name : <?php echo $result['USER_FIRSTNAME'] ?></p>
    <p>ID : <?php echo $result['USER_ID'] ?></p>
    <p>Category : <?php echo $result['USER_CATEGORIE_ID'] ?></p>
    <p>Phone : <?php echo $result['USER_PHONE'] ?></p>
    <p>Mail : <?php echo $result['USER_MAIL'] ?></p>
<?php

}

?>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
