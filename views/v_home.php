<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<!--  Début de la page -->
<!-- <h1><?= TITRE_PAGE_ACCUEIL ?></h1> -->

<?php
if (!$_SESSION['logged']) {
?>
    <div class="content">
        <div class="links">
            <a href="index.php?page=login"><?= LOGIN ?></a>
            <a href="index.php?page=register"><?= REGISTER ?></a>
        </div>
    </div>
<?php
} else { ?>
    <div class="content">
        <h1 id="title">Welcome <?php echo $_SESSION['first_name'] ?> !</h1>
        <div class="links">
            <a href="index.php?page=account">My account</a>
            <a href="index.php?page=ticket_list">My tickets</a>
            <a href="index.php?page=shopping">Get tickets</a>
            <a href="index.php?page=logout">Logout</a>
        </div>
    </div>
<?php
}
?>


<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
