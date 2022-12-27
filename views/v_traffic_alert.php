<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'traffic_alert.js' ?> type="module" defer></script>
<form method="post" action="index.php?page=traffic_alert">
    <div id="alertContainer">
        <a><img data-id="1" class="alertImage" src=" <?= PATH_IMAGES . 'alert_bomb.svg' ?>" alt="alert_bomb"></a>
        <a><img data-id="2" class="alertImage" src=" <?= PATH_IMAGES . 'alert_gun.svg' ?>" alt="alert_gun"></a>
        <a><img data-id="3" class="alertImage" src=" <?= PATH_IMAGES . 'alert_rescue.svg' ?>" alt="alert_rescue"></a>
        <a><img data-id="4" class="alertImage" src=" <?= PATH_IMAGES . 'alert_medical.svg' ?>" alt="alert_medical"></a>
        <a><img data-id="5" class="alertImage" src=" <?= PATH_IMAGES . 'alert_rail_crossing.svg' ?>" alt="alert_rail_crossing"></a>
        <a><img data-id="6" class="alertImage" src=" <?= PATH_IMAGES . 'alert_railway.svg' ?>" alt="alert_railway"></a>
        <a><img data-id="7" class="alertImage" src=" <?= PATH_IMAGES . 'alert_sign.svg' ?>" alt="alert_sign"></a>
        <a><img data-id="8" class="alertImage" src=" <?= PATH_IMAGES . 'alert_electric.svg' ?>" alt="alert_electric"></a>
        <a><img data-id="9" class="alertImage" src=" <?= PATH_IMAGES . 'alert_maintenance.svg' ?>" alt="alert_maintenance"></a>
        <a><img data-id="10" class="alertImage" src=" <?= PATH_IMAGES . 'alert_temperature.svg' ?>" alt="alert_temperature"></a>
        <a><img data-id="11" class="alertImage" src=" <?= PATH_IMAGES . 'alert_fire.svg' ?>" alt="alert_fire"></a>
        <a><img data-id="12" class="alertImage" src=" <?= PATH_IMAGES . 'alert_other.svg' ?>" alt="alert_other"></a>
    </div>
    <div id="locationContainer">
        <input id="infoPosition" name="infoposition" placeholder="<?= LOCATION ?>">
        <a id="positionButton"><img src=" <?= PATH_IMAGES . 'ping.svg' ?>"></a>
    </div>
    <textarea id="message" name="message" placeholder="<?= DESCRIPTION ?>" required></textarea>
    <input type="hidden" id="alertType" name="alertType" required>
</form>

<?php require_once(PATH_VIEWS . 'footer.php');
