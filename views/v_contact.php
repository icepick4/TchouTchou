<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<!--  Début de la page -->

    <div id='page'>
        <h1><?= TITLE_CONTACT ?></h1>
        <form action="POST" id ='form'>
            <input type="text" id="name" name="name" placeholder="<?= NAME ?>">
            <input type="text" id="fname" name="fname" placeholder="<?= FIRST_NAME ?>">
            <input type="tel" id="tel" name="tel" placeholder="<?= PHONE ?>">
            <input type="email" id="email" name="email" placeholder="<?= EMAIL ?>">
            <input type="text" id="subject" name="subject" placeholder="<?= SUBJECT ?>">
            <textarea id="desc" name="desc" rows="10" cols="30" placeholder="<?= DESC ?>"></textarea>
        </form>
        <div class='links'><a href="tkt" id="submit"><?= SUBMIT ?></a></div>
    </div>

<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');