<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<form method="post" action="index.php?page=travel">
        <label><?=?></label>
        <input type="email" name="mail" id="email" placeholder="<?= EMAIL ?>"></input>
        <input type="submit" value="Login"></input>
    </form>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
