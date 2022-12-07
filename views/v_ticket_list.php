<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>


<!--  Début de la page -->


<?php

if ($_SESSION['logged']) {
?>
    <div id="title-ticket-list">
        <h1><?= MY_TICKETS ?></h1>
    </div>
    <?php
    for ($i = 0; $i < count($tickets); $i++) {
    ?>
        <div class="tickets">
            <div class="ticket">
                <p>From</p>
                <p> <?php echo $tickets[$i]['START_STATION_NAME'] ?> </p>
                <p>To</p>
                <p> <?php echo $tickets[$i]['END_STATION_NAME'] ?> </p>
                <p> The <?php //get hour and date of the date
                        $date = $tickets[$i]['DEPARTURE_TIME'];
                        echo $date; ?> </p>
                <a href="index.php?page=single_ticket&ticket=<?php echo $tickets[$i]['TRAVEL_ID'] ?>">More...</a>
            </div>

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
}
?>
<div class="link-ticket-list">
    <div class="links">
        <a href="index.php?page=shopping"><?= BUY_TICKET ?></a>
    </div>
</div>
<!--  Fin de la page -->

<!--  Pied de page -->

<?php require_once(PATH_VIEWS . 'footer.php'); ?>