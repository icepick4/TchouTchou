<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'planning_driver.js?flag=' . $driver ?> type="module" defer></script>
<!--  Début de la page -->
<h1>Planning</h1>

<div id="planning">
    
</div>

<div class="close" id="overlay"></div>
<div id="infoModal">
    <span id="infoModalClose" class="close">&times;</span>
    <div id="infoModalContent">
    </div>
</div>



<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
