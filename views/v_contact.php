<!-- Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'contact.js' ?> type="module" defer></script>

<!--  Début de la page -->

<div id='page'>
    <h1><?= TITLE_CONTACT ?></h1>
    <form method="post" action="index.php?page=contact" id="form">
        <label id="info"></label>
        <?php if (!$_SESSION['logged']) { ?>
            <input type="text" id="name" name="name" placeholder="<?= NAME ?>">
            <input type="text" id="fname" name="fname" placeholder="<?= FIRST_NAME ?>">
            <input type="tel" id="tel" name="tel" placeholder="<?= PHONE ?>">
            <input type="email" id="email" name="email" placeholder="<?= EMAIL ?>">
        <?php } ?>
        <input type="text" id="subject" name="subject" placeholder="<?= SUBJECT ?>">
        <textarea id="desc" name="desc" rows="10" cols="30" maxlength="4000" placeholder="<?= DESC ?>"></textarea>
        <input class='links' type="submit" value=<?= SUBMIT ?>></input>
    </form>
</div>

<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
