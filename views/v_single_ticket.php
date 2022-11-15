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
            <h2>Trip to <?php echo $ticket['END_STATION_ID'] ?></h2>
        </div>
        <div class="stations">
            <div class="station">
                <div class="station-time">
                    <p><?php echo $ticket['START_TIME'] ?></p>
                </div>
                <div class="station-name">
                    <h3><?php echo $ticket['START_STATION_ID'] ?></h3>
                </div>

            </div>
            <div class="station">
                <div class="station-time">
                    <p><?php echo $ticket['END_TIME'] ?></p>
                </div>
                <div class="station-name">
                    <h3><?php echo $ticket['END_STATION_ID'] ?></h3>
                </div>
            </div>
        </div>
        <p>Les infos seront plus joliement affichés par la suite, mais ça marche pour le moment</p>
    </div>

    <div class="link-ticket-list">
        <div class="links">
            <a href="index.php?page=ticket_list">Back to your tickets</a>
        </div>
    </div>
<?php
}

?>



<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
