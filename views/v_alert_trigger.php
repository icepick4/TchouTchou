<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'alert_trigger.js' ?> type="module" defer></script>


<script type="text/javascript">
    
let marker;
let map;


function initMap() {
  var myLatlng = {lat: 46.611, lng: 2.442}; //~ france

  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 5,
    center: myLatlng,
    mapId:  'ff96761909dd93c7' // custom map
  });

  // default marker for simplicity
   marker = new google.maps.Marker({
    position: myLatlng,
    map: map
  });

  map.addListener('click', function(event) {

    //tmp value to store click position
    let myLatlng = {lat: event.latLng.lat(), lng: event.latLng.lng()};

    //hide old marker
    marker.setMap(null);

    //set new marker
    marker = new google.maps.Marker({
      position: myLatlng,
      map: map });
    
    });
  
}

function getPos(){
  console.log(marker.position.lat()+"//"+ marker.position.lng());
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOE0WOjNXmymZ-seKlbzVcSvW-Xaz-sYo&callback=initMap">
</script>


<?php require_once(PATH_VIEWS . 'alert_trigger.php'); ?>

<form method="post" action="index.php?page=al">
    <p id="info" class="info"><?= SELECT_ALERT_TYPE ?></p>
    <p id="info2" class="info"><?= AUTHORIZE_LOCATION ?></p>
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
        <div id="map"></div>
    </div>
    <textarea id="message" name="message" placeholder="<?= DESCRIPTION ?>" required></textarea>
    <input type="hidden" id="alertType" name="alertType">
    <input type="submit" value="<?= SEND_ALERT ?>" >
</form>

<?php require_once(PATH_VIEWS . 'footer.php');
