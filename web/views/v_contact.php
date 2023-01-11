<!-- Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'contact.js' ?> type="module" defer></script>

<!--  Début de la page -->

<div id='page'>
    <h1><?= TITLE_CONTACT ?></h1>
    <form method="post" action="index.php?page=contact" id="form">
        <?php if (!$_SESSION['logged']) { ?>
            <label class="error shown"><?= ERROR_NAME ?></label>
            <input type="text" id="name" name="name" placeholder="<?= NAME ?>">
            <label class="error shown"><?= ERROR_FIRSTNAME ?></label>
            <input type="text" id="fname" name="fname" placeholder="<?= FIRST_NAME ?>">
            <label class="error shown"><?= ERROR_PHONE ?></label>
            <input type="tel" id="tel" name="tel" placeholder="<?= PHONE ?>">
            <label class="error shown"><?= ERROR_MAIL ?></label>
            <input type="email" id="email" name="email" placeholder="<?= EMAIL ?>">
        <?php } ?>
        <label class="error shown"><?= ERROR_CHARACTER ?></label>
        <input type="text" id="subject" name="subject" placeholder="<?= SUBJECT ?>">
        <label class="error shown"><?= ERROR_CHARACTER ?></label>
        <textarea id="desc" name="desc" rows="10" cols="30" maxlength="4000" placeholder="<?= DESC ?>"></textarea>
        <label class="error shown"><?= ERROR_FORM ?></label>
        <input class='links' type="submit" value=<?= SUBMIT ?>></input>
    </form>
</div>

<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
