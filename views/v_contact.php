<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<!--  Début de la page -->

    <div id='form'>
        <h1>Contact</h1>
        <form action="POST">
            <input type="text" id="name" name="name" placeholder="Nom">
            <input type="text" id="fname" name="fname" placeholder="Prénom">
            <input type="tel" id="tel" name="tel" placeholder="Numéro de téléphone">
            <input type="email" id="email" name="email" placeholder="Email">
            <input type="text" id="sujet" name="sujet" placeholder="Sujet">
            <textarea id="message" name="message" rows="10" cols="30" placeholder="Description"></textarea>
        </form>
        <button>Envoyer</button>
    </div>

<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');