<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>


<?php

if ($_SESSION['logged']) {
?>
    <div id="title-ticket-list">
        <h1>Here are your tickets</h1>
    </div>
    <?php
    //no style on this, getting data for the moment
    for ($i = 0; $i < count($tickets); $i++) {
    ?>
        <div class="tickets">
            <div class="ticket">
                <p>From</p>
                <p> <?php echo $tickets[$i]['START_STATION_NAME'] ?> </p>
                <p>To</p>
                <p> <?php echo $tickets[$i]['END_STATION_NAME'] ?> </p>
                <p> The <?php //get hour and date of the date
                        $date = new DateTime($tickets[$i]['TRAVEL_DATETIME']);
                        echo $date->format('d/m/Y'); ?> </p>
                <a href="index.php?page=single_ticket&ticket=<?php echo $tickets[$i]['TRAVEL_ID'] ?>">More...</a>
            </div>

        </div>
<?php
    }
}
?>
<div class="link-ticket-list">
    <div class="links">
        <a href="index.php?page=shopping">Get tickets</a>
    </div>
</div>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>