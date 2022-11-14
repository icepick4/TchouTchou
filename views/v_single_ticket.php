<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<?php

if ($_SESSION['logged']) {
    echo 'Details of your ticket' . $_SESSION['user_id'];
    //no style on this, getting data for the moment
    echo $ticket['DEPARTURE_STATION'];
    echo $ticket['ARRIVAL_STATION'];
    echo $ticket['LINE_ID'];
    echo $ticket['TRAIN_ID'];
    echo $ticket['TICKET_ID'];
}

?>

<div class="content">
    <div class="header-ticket">
        <h2>Trip to <?php //echo $ticket['ARRIVAL_STATION'] 
                    ?></h2>
        <p>Ven. 12 mars 2021</p>
    </div>
    <div class="stations">
        <div class="station">
            <div class="station-time">
                <p><?php //echo $ticket['DEPARTURE_TIME'] 
                    ?></p>
                <p>15:30</p>
            </div>
            <div class="station-name">
                <h3><?php //echo $ticket['DEPARTURE_STATION'] 
                    ?></h3>
                <h3>Part dieu</h3>
            </div>

        </div>
        <div class="station">
            <div class="station-time">
                <p><?php //echo $ticket['ARRIVAL_TIME'] 
                    ?></p>
                <p>15:30</p>
            </div>
            <div class="station-name">
                <h3><?php //echo $ticket['ARRIVAL_STATION'] 
                    ?></h3>
                <h3>Part dieu</h3>
            </div>

        </div>
    </div>
</div>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
