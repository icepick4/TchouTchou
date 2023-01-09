<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>
<script src=<?= PATH_JS . 'ticket_single.js?flag=' . $_SESSION['user_id'] ?> type="module" defer></script>


<!--  Début de la page -->
<?php

if ($ticket != null) {

?>
    <h1 id="title-trip"><?= TRAVEL_TO ?><span class="colored"><?= $ticket[0]['END_STATION_NAME'] ?></span></h1>
    <h2 id="title-ticket"><?= YOUR_TRAVEL ?></h2>
    <div id="travel_details">
        <p><?php
            echo (getDay($ticket[0]['DEPARTURE_DATE'])) . ' ';
            echo ' ' . date('d', strtotime($ticket[0]['DEPARTURE_DATE'])) . ' ';
            echo (getMonth($ticket[0]['DEPARTURE_DATE']));
            ?></p>
        <p><span class="colored"><?= $ticket[0]['DEPARTURE_TIME'] ?></span> ● <?= $ticket[0]['START_STATION_NAME'] ?></p>
        <p>Voyage n°<span class="colored"><?= $ticket[0]['TRAVEL_ID'] ?></span></p>
        <p><span class="colored"><?= $ticket[0]['END_TIME'] ?></span> ● <?= $ticket[0]['END_STATION_NAME'] ?></p>
    </div>
    <?php if (sizeof($ticket) > 1) { ?>
        <h2 id="title-ticket-list"><?= TICKETS_DETAIL ?></h2>
    <?php } else { ?>
        <h2 id="title-ticket"><?= TICKET_DETAIL ?></h2>
    <?php } ?>
    <div id="travel-tickets">
        <?php $i = 1;
        foreach ($ticket as $ticket_unit) {
        ?>

            <div class="ticket">
                <p>Voyageur n°<?= $i++ ?></p>
                <div>
                    <p><?= $ticket_unit['FIRSTNAME'] ?></p>
                    <p><?= $ticket_unit['LASTNAME'] ?></p>
                    <div>
                        <?= SVG_SEAT ?>
                        <p><?= $ticket_unit['PLACE_ID'] ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <div id="button-set-ticket">
        <button id="delete-button"><?= BTN_DELETE ?></button>
    </div>
    <div class="links-content">
        <div class="link-ticket-list">
            <div class="links">
                <a href="index.php?page=ticket_list"><?= BACK_TICKETS ?></a>
            </div>
        </div>
        <div class="link-ticket-list">
            <div class="links">
                <a href="index.php?page=buy"><?= BUY_TICKET ?></a>
            </div>
        </div>
    </div>
<?php
} else {
    echo '<h1 id="title-trip">' . NO_TICKET_RELATED . '</h1>';
}

?>

<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
