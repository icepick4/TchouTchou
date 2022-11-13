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
