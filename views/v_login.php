<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'login.js' ?> type="module" defer></script>
<script src=<?= PATH_JS . 'passwordShow.js' ?> type="module" defer></script>


<!--  Début de la page -->


<?php if (!$_SESSION['logged']) { ?>
    <h1 id="title"><?= LOGIN ?></h1>

    <?php require_once(PATH_VIEWS . 'alert.php'); ?>

    <form method="post" action="index.php?page=login">
        <label id="info" class="info"><?= ERROR_MAIL ?></label>
        <input type="email" name="mail" id="email" placeholder="<?= EMAIL ?>"></input>
        <div><input type="password" name="password" id="password" placeholder="<?= PASSWORD ?>"></input><i class="show-password"><svg fill=var(--border-input) xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z" />
                </svg></i></div>
        <input type="submit" value="Login"></input>
    </form>
    <div class="smallLink">
        <a href="index.php?page=register"><?= REGISTER ?> ></a>
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
