<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS ?>buy_place.js type="module" defer></script>

<!--  Début de la page -->
<h1><?= SELECT_SEATS ?></h1>

<div id="content"></div>

<div id="buttonContainer">
    <button id="previous"><?= PREVIOUS ?></button>
    <button id="next"><?= NEXT ?></button>
</div>
<div id="textContainer">
    <p><?= NO_SELECTED_SEAT ?></p>
    <p class="none"><?= SELECTED_SEAT ?></p>
</div>
<div>
    <p id="continueText"><?= SEAT_NEEDED ?></p>
    <a href="index.php?page=buy_details&travel=<?= $travel_id ?>&line=<?= $line ?>&from=<?= $from ?>&to=<?= $to ?>&nbr=<?= $nbr ?>&seat="  id="continueButton" class="disabled"><?= VALIDATE ?></a>
</div>



<p id="seatArray" style="display:none"><?php 
    foreach ($places as $place) {
        echo $place["PLACE_ID"] . '//';
    }
?></p>
<p id="nbrSeats" style="display:none"><?= $nbr?> </p>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
