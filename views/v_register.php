<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>
<script src=<?= PATH_JS . 'register.js' ?> type="module" defer></script>
<script src=<?= PATH_JS . 'passwordShow.js' ?> type="module" defer></script>


<!--  Début de la page -->


<h1 id="title">
        <?= REGISTER ?>
</h1>

<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<form method="post" action="index.php?page=register">
        <label class="info">
                <?= ERROR_FORM ?>
        </label>
        <input type="text" id="name" name="name" placeholder="<?= NAME ?>" required>
        <label class="info">
                <?= ERROR_NAME ?>
        </label>
        <input type="text" id="fname" name="fname" placeholder="<?= FIRST_NAME ?>" required>
        <label class="info">
                <?= ERROR_FIRSTNAME ?>
        </label>
        <input type="phone" id="phone" name="phone" placeholder="<?= PHONE ?>" required>
        <label class="info">
                <?= ERROR_PHONE ?>
        </label>
        <input type="email" id="email" name="email" placeholder="<?= EMAIL ?>" required>
        <label class="info">
                <?= ERROR_MAIL ?>
        </label>
        <div id="boxPassword">
                <input type="password" name="password" id="password" placeholder="<?= PASSWORD ?>" required></input>
                <label class="info">
                        <?= ERROR_PASSWORD_TOO_WEAK ?>
                </label>
                <i class="show-password"><svg fill=var(--border-input) xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z" />
                        </svg></i>
        </div>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="<?= CONFIRMPASSWORD ?>" required>
        <label class="info">
                <?= ERROR_PASSWORD_DIFFERENT ?>
        </label>
        <div>
                <input type="checkbox" id="cgu" required><label for="cgu">
                        <?= PLEASE_ACCEPT ?><a href="index.php?page=cgu"><?= TITLE_TERMS_OF_USE ?></a>
                </label>
        </div>
        <input type="submit" value=<?= TOREGISTER ?>></input>
</form>
<div class="smallLink">
        <a href="index.php?page=login">
                <?= LOGIN ?> >
        </a>
</div>

<!--  Fin de la page -->

<!--  Pied de page -->

<?php require_once(PATH_VIEWS . 'footer.php');
