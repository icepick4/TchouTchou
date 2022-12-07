<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>


<!--  Début de la page -->
<?php

if ($_SESSION['logged']) {

?>
    <div id="title-ticket-list">
        <h1><?= TICKET_DETAIL ?></h1>
    </div>
    <div class="content">
        <div class="header-ticket">
            <h2 id="title-trip"><?= TRAVEL_TO ?><p class="colored"><?php echo $ticket['END_STATION_NAME'] ?></p>
            </h2>
            <p> <?php echo $ticket['START_TIME_DATE'] ?> </p>
        </div>
        <div class="stations">
            <div class="station">
                <div class="station-time">
                    <p class="colored"><?php echo $ticket['DEPARTURE_TIME'] //echo $ticket['START_TIME_HOUR'] 
                                        ?>:<?php //echo $ticket['START_TIME_MINUTE'] 
                                            ?></p>
                </div>
                <div class="station-name">
                    <h3><?php echo $ticket['START_STATION_NAME'] ?></h3>
                </div>

            </div>
            <div class="station">
                <div class="station-time">
                    <p class="colored"><?php echo $ticket['ARRIVAL_TIME'] //echo $ticket['END_TIME_HOUR'] 
                                        ?>:<?php //echo $ticket['END_TIME_MINUTE'] 
                                            ?></p>
                </div>
                <div class="station-name">
                    <h3><?php echo $ticket['END_STATION_NAME'] ?></h3>
                </div>
            </div>
        </div>
        <div id="separator"></div>
        <div class="infos">
            <p><?= DURATION ?> : <?php echo $ticket['DURATION'] ?> <?= MINUTES ?></p>
            <p><?= TRAIN ?> : <?php echo $ticket['TRAIN_ID'] ?></p>
            <p><?= TRAVEL ?> : <?php echo $ticket['TRAVEL_ID'] ?></p>
        </div>
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
