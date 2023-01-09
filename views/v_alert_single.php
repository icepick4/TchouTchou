<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'alert_single.js' ?> type="module" defer></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
      defer
    ></script>


<!--  Début de la page -->




<?php if ($alert == null) {  ?>

    <h1><?= ALERT_DOES_NOT_EXIST ?></h1>

    <?php }else{ ?>
        
        <h1><?= ALERTS_HEADER . $alert['TRAVEL_ID']?></h1>
        <div id="alert_box">
            <div id="alert_header">
                <p><?= $alert['DATETIME_TRAVEL'] ?></p>
                <img class="alertLogo" src="<?= PATH_IMAGES . $logo ?>" alt="logo de l'alerte">
            </div>
            <p><?= $alert['ALERT_MESSAGE'] ?></p>
            <button id="finishButton" class="<? if($alert['ALERT_STATUS']!=1 || $staff->isStation($_SESSION['user_id'])){ echo "disabled";}?> " ><? if($alert['ALERT_STATUS']==1){ echo ALERT_NOT_FINISHED; }else{ echo ALERT_FINISHED; } ?></button>
        </div>
        
    <iframe
        width="600"
        height="450"
        style="border:0"
        loading="lazy"
        allowfullscreen
        referrerpolicy="no-referrer-when-downgrade"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAOE0WOjNXmymZ-seKlbzVcSvW-Xaz-sYo
        &q=<?= $coord[0] ."+".$coord[1] ?>">
    </iframe>


<?php } ?>


<?php require_once(PATH_VIEWS . 'footer.php');
