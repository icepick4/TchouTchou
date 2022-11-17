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
            <h2 id="title-trip">Trip to <p class="colored"><?php echo $ticket['END_STATION_NAME'] ?></p>
            </h2>
            <p> <?php echo $date ?> </p>
        </div>
        <div class="stations">
            <div class="station">
                <div class="station-time">
                    <p class="colored"><?php echo $ticket['START_TIME_HOUR'] ?>:<?php echo $ticket['START_TIME_MINUTE'] ?></p>
                </div>
                <div class="station-name">
                    <h3><?php echo $ticket['START_STATION_NAME'] ?></h3>
                </div>

            </div>
            <div class="station">
                <div class="station-time">
                    <p class="colored"><?php echo $ticket['END_TIME_HOUR'] ?>:<?php echo $ticket['END_TIME_MINUTE'] ?></p>
                </div>
                <div class="station-name">
                    <h3><?php echo $ticket['END_STATION_NAME'] ?></h3>
                </div>
            </div>
        </div>
        <div id="separator"></div>
        <div class="infos">
            <p>Duration : <?php echo $ticket['DURATION'] ?> minutes</p>
            <p>Train : <?php echo $ticket['TRAIN_ID'] ?></p>
            <p>Travel : <?php echo $ticket['TRAVEL_ID'] ?></p>
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