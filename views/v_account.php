<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<!--  Début de la page -->

<?php print_r($result) ?>

<?php

if ($_SESSION['logged']) {
    echo 'Bonjour ' . $_SESSION['user_id'];
?>
    <!-- no style on this, getting data for the moment -->
    <a href="index.php?page=logout">Logout</a>
    <a href="index.php?page=ticket_list">My tickets</a>
    <a href="index.php?page=shopping">Get tickets</a>
    <p>Last name : <?php echo $result['USER_LAST_NAME'] ?></p>
    <p>First name : <?php echo $result['USER_FIRST_NAME'] ?></p>
    <p>ID : <?php echo $result['USER_ID'] ?></p>
    <p>Category : <?php echo $result['USER_CATEGORY'] ?></p>
    <p>Phone : <?php echo $result['USER_PHONE'] ?></p>
    <p>Mail : <?php echo $result['USER_MAIL'] ?></p>
<?php

}

?>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
