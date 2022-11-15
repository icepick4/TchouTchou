<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>


<?php

if ($_SESSION['logged']) {
    echo 'Here are your tickets' . $_SESSION['user_id'];
    //no style on this, getting data for the moment
    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        foreach ($result as $ticket) {
            echo $ticket['DEPARTURE_STATION'];
            echo $ticket['ARRIVAL_STATION'];
        }
    }
}
?>

<a href="index.php?page=shopping">Get tickets</a>