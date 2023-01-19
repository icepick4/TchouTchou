<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>


<script src=<?= PATH_JS . 'travel.js' ?> type="module" defer></script>




<p id="stationsArray" style="display:none"><?php foreach ($stations as $station) { echo $station['STATION_NAME'] . '//';}?></p>


<section class="form">
    <h2>Départ - Destination</h2>
    <div id="city-selector">
        <div class="container">
            <input type="text" id="search1" autocomplete="off" placeholder="<?= START_STATION ?>" name="from" class="search" >
            <i class="clear-search">X</i>
        </div>
        <a id="boxArrow"><img src="<?= PATH_IMAGES . "exchangeArrow.svg" ?>" id="exchangArrow"></a>
        <div class="container">
            <input type="text" id="search2" autocomplete="off" placeholder="<?= END_STATION ?>" name="to" class="search" >
            <i class="clear-search">X</i>
        </div>
    </div>
    <h2>Trajet</h2>
    <input type="datetime-local" name="date" id="date" />
    <p id="errorText" class="hidden"><?= ERROR_TRAVEL_TEXT ?></p>
    <button id="lineButton" ><?= BTN_CREATE ?></input>

</section>

<section id="lines">
    
</section>

<section id="staff">
    
</section>

<section id="train">
    
</section>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
