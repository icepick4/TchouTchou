<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>


<?php

if ($_SESSION['logged']) {
    echo 'Here are your tickets' . $_SESSION['user_id'];
    //no style on this, getting data for the moment
    for ($i = 0; $i < count($tickets); $i++) {
?>
        <div class="tickets">
            <div class="ticket">
                <p>From</p>
                <p> <?php echo $tickets[$i]['START_STATION_ID'] ?> </p>
                <p>To</p>
                <p> <?php echo $tickets[$i]['END_STATION_ID'] ?> </p>
            </div>

        </div>
<?php
    }
}
?>

<a href="index.php?page=shopping">Get tickets</a>