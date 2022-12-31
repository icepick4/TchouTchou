<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>
<script src=<?= PATH_JS . 'ticket_single.js?flag=' . $_SESSION['user_id'] ?> type="module" defer></script>


<!--  Début de la page -->
<?php

if ($_SESSION['logged']) {

?>
    <h1 id="title-trip"><?= TRAVEL_TO ?><span class="colored"><?php echo $ticket[0]['END_STATION_NAME'] ?></span></h1>
    <h2 id="title-ticket"><?= YOUR_TRAVEL ?></h2>
    <div id="travel_details">
        <p><?php 
            if (date('l',strtotime($ticket[0]['DEPARTURE_DATE'])) == "Monday") {
                echo MONDAY;
            } else if (date('l',strtotime($ticket[0]['DEPARTURE_DATE'])) == "Tuesday") {
                echo TUESDAY;
            } else if (date('l',strtotime($ticket[0]['DEPARTURE_DATE'])) == "Wednesday") {
                echo WEDNESDAY;
            } else if (date('l',strtotime($ticket[0]['DEPARTURE_DATE'])) == "Thursday") {
                echo THURSDAY;
            } else if (date('l',strtotime($ticket[0]['DEPARTURE_DATE'])) == "Friday") {
                echo FRIDAY;
            } else if (date('l',strtotime($ticket[0]['DEPARTURE_DATE'])) == "Saturday") {
                echo SATURDAY;
            } else {
                echo SUNDAY;
            }
            echo ' '.date('d',strtotime($ticket[0]['DEPARTURE_DATE'])).' ';
            if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "January") {
                echo JANUARY;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "February") {
                echo FEBRUARY;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "March") {
                echo MARCH;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "April") {
                echo APRIL;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "May") {
                echo MAY;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "June") {
                echo JUNE;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "July") {
                echo JULY;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "August") {
                echo AUGUST;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "September") {
                echo SEPTEMBER;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "October") {
                echo OCTOBER;
            } else if (date('F',strtotime($ticket[0]['DEPARTURE_DATE'])) == "November") {
                echo NOVEMBER;
            } else {
                echo DECEMBER;
            }
     ?></p>
        <p><span class="colored"><?php echo $ticket[0]['DEPARTURE_TIME']?></span> ● <?= $ticket[0]['START_STATION_NAME']?></p>
        <p>Voyage n°<span class="colored"><?php echo $ticket[0]['TRAVEL_ID']?></span></p>
        <p><span class="colored"><?php echo $ticket[0]['END_TIME']?></span> ● <?= $ticket[0]['END_STATION_NAME']?></p>
    </div>
    <?php if (sizeof($ticket) > 1) { ?>
        <h2 id="title-ticket-list"><?= TICKETS_DETAIL ?></h2>
    <?php } else {?>
        <h2 id="title-ticket"><?= TICKET_DETAIL ?></h2>
    <?php } ?>
    <div id="travel-tickets">
        <?php $i = 1;
            foreach ($ticket as $ticket_unit) { 
                ?>
            
            <div class="ticket">
                <p>Voyageur n°<?= $i++ ?></p>
                <div>
                    <p><?= $ticket_unit['FIRSTNAME']?></p>
                    <p><?= $ticket_unit['LASTNAME']?></p>
                    <div>
                        <?= SVG_SEAT ?>
                        <p><?= $ticket_unit['PLACE_ID']?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    
    </div>
    <div id="button-set-ticket">
    <button id="modify-button"><?= MODIFY ?></button>
    <button id="cancel-button"><?= DELETE ?></button>
    </div>
    <div class="links-content">
        <div class="link-ticket-list">
            <div class="links">
                <a href="index.php?page=ticket_list"><?= BACK_TICKETS ?></a>
            </div>
        </div>
        <div class="link-ticket-list">
            <div class="links">
                <a href="index.php?page=shopping"><?= BUY_TICKET ?></a>
            </div>
        </div>
    </div>
<?php
}

?>

<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
