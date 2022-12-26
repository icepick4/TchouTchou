<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>


<!--  Début de la page -->


<?php


?>
    <div id="title-ticket-list">
        <h1><?= MY_TICKETS ?></h1>
    </div>
    <?php
    for ($i = 0; $i < count($tickets); $i++) {
    ?>
        <div class="tickets">
        <a href="index.php?page=single_ticket&ticket=<?php echo $tickets[$i]['TRAVEL_ID'] ?>">
            <div class="ticket">
                <p><?= $tickets[$i]['DEPARTURE_DATE']?> ● Voyage à <span><?= $tickets[$i]['START_STATION_NAME']?></span></p>
                <p><?= $tickets[$i]['DEPARTURE_TIME']?> - <?=$tickets[$i]['START_STATION_NAME']?></p>
                <p><?= $tickets[$i]['END_TIME']?> - <?=$tickets[$i]['END_STATION_NAME']?></p>
                <div><?= SVG_ACCOUNT?><p>x<?= $tickets[$i]['NBR']?></p></div>
            </div>
        </a>

        </div>
    <?php
    }
    if (count($tickets) == 0) {
    ?>
        <div id="title-ticket-list">
            <h2><?= NO_TICKET ?></h2>
        </div>
<?php
    }

?>
<div class="link-ticket-list">
    <div class="links">
        <a href="index.php?page=purchase"><?= BUY_TICKET ?></a>
    </div>
</div>
<!--  Fin de la page -->

<!--  Pied de page -->

<?php require_once(PATH_VIEWS . 'footer.php'); ?>