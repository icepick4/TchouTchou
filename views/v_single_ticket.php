<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<?php

if ($_SESSION['logged']) {

?>
    <div id="title-ticket-list">
        <h1>Details of your ticket</h1>
    </div>
    <div class="content">
        <div class="header-ticket">
            <h2 id="title-trip">Trip to <p class="colored"><?php echo $ticket['END_STATION_ID'] ?></p>
            </h2>
            <p> <?php echo $ticket['DATE'] ?> </p>
        </div>
        <div class="stations">
            <div class="station">
                <div class="station-time">
                    <p class="colored"><?php echo $ticket['START_TIME'] ?></p>
                </div>
                <div class="station-name">
                    <h3><?php echo $ticket['START_STATION_ID'] ?></h3>
                </div>

            </div>
            <div class="station">
                <div class="station-time">
                    <p class="colored"><?php echo $ticket['END_TIME'] ?></p>
                </div>
                <div class="station-name">
                    <h3><?php echo $ticket['END_STATION_ID'] ?></h3>
                </div>
            </div>
        </div>
        <div id="separator"></div>
        <div class="infos">
            <p>Duration : <?php //get duration of the trip
                            $start = new DateTime($ticket['START_TIME']);
                            $end = new DateTime($ticket['END_TIME']);
                            $interval = $start->diff($end);
                            echo $interval->format('%Hh %Im'); ?> </p>
        </div>
    </div>

    <div class="links-content">
        <div class="link-ticket-list">
            <div class="links">
                <a href="index.php?page=ticket_list">Back to your tickets</a>
            </div>
        </div>
        <div class="link-ticket-list">
            <div class="links">
                <a href="index.php?page=shopping">Get tickets</a>
            </div>
        </div>
    </div>
<?php
}

?>



<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
