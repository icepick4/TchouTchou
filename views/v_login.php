<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<!--  Début de la page -->


<?php if (!$_SESSION['logged']) { ?>
    <h1 id="title">Connexion</h1>
    <form method="post" action="index.php?page=login">
        <input type="mail" name="mail" id="mail" placeholder="Email"></input>
        <input type="password" name="password" id="password" placeholder="Password"></input>
        <input type="submit" value="Login"></input>
    </form>
    <div class="links">
        <a href="index.php?page=register">Register</a>
    </div>
<?php } ?>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
