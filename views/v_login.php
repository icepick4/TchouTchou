<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'login.js' ?> type="module" defer></script>
<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<!--  Début de la page -->


<?php if (!$_SESSION['logged']) { ?>
    <h1 id="title"><?= LOGIN ?></h1>
    <form method="post" action="index.php?page=login">
        <label id="info"><?= ERROR_MAIL ?></label>
        <input type="mail" name="mail" id="email" placeholder="<?= EMAIL ?>"></input>
        <input type="password" name="password" id="password" placeholder="<?= PASSWORD ?>"></input>
        <input type="submit" value="Login"></input>
    </form>
    <div class="links">
        <a href="index.php?page=register"><?= REGISTER ?></a>
    </div>
<?php } else {
?>
    <div class="links">
        <a href="index.php?page=logout"><?= LOGOUT ?></a>
    </div>
<?php
}
?>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
