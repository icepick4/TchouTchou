<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<!--  Début de la page -->


<?php if (!$_SESSION['logged']) { ?>
    <form method="post" action="index.php?page=login">
        <label>mail :<input type="mail" name="mail" id="mail"></input></label>
        <label>mot de passe :<input type="password" name="password" id="password"></input></label>
        <button type="submit">envoyer</button>
    </form>
<?php } ?>

<?php if ($_SESSION['logged']) {
    echo '<a href="index.php?page=logout">se déconnecter</a>';
} ?>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
