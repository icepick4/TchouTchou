<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'planning_driver.js?flag=' . $driver ?> type="module" defer></script>
<!--  Début de la page -->
<h1>Planning</h1>

<table id="planning">
    
</table>

<div class="close" id="overlay"></div>
<div id="infoModal">
    <span id="infoModalClose" class="close">&times;</span>
    <div id="infoModalContent">

    </div>
</div>

<div>
    <button id="previousButton"><?= PREVIOUS ?></button>
    <button id="nextButton"><?= NEXT ?></button>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
