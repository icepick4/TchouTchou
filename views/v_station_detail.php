<!--  Entête de la page -->
<?php
require_once(PATH_VIEWS . 'header.php');

?>
<script src=<?= PATH_JS . 'station_detail.js' ?> type="module" defer></script>

<!--  Début de la page -->
<div class="container">
    <button onclick="document.location.href='index.php?page=station_list'"><?= BTN_RETURN ?></button>
    <?php if (isset($station_name['STATION_NAME'])) { ?>
        <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
            <p id="departuresText"><?= DEPARTURES ?></p>
            <p id="arrivalsText"><?= ARRIVALS ?></p>
        </label>
    <?php } ?>
</div>
<?php if (isset($station_name['STATION_NAME'])) { ?>
    <h1><?= STATION_OF . $station_name['STATION_NAME'] ?></h1>
    <?php
    if (!$departTravels && !$arrivalTravels) {
    ?>
        <h2><?= NO_TRAIN ?></h2>
    <?php
    } else {
    ?>
        <section id="departures">
            <?php
            if ($departTravels) { ?>

                
            <? } else { ?>
                <h2><?= NO_DEPARTURE ?></h2>
            <?php };
            ?>
        </section>
        <section id="arrivals">
            <?php
            if ($arrivalTravels) { ?>
                
            <?php
            } else { ?><h2><?= NO_ARRIVAL ?></h2><?php }
                                            } ?>
        </section><?php
                } else {
                    echo "<h1>" . STATION_NOT_EXIST . "</h1>";
                } ?>

    </section>
    <button id="fullScreenButton"><?= FULL_SCREEN ?></button>

    <!--  Fin de la page -->

    <!--  Pied de page -->
    <? require_once(PATH_VIEWS . 'footer.php'); ?>

<script>

    function loadBoard(){
        let departures = document.getElementById('departures')
        let arrivals = document.getElementById('arrivals')
        var xhttp = new XMLHttpRequest();
        xhttp.open(
            'GET',
            'index.php?api=departures&id=' +
                <?= $_GET['id'] ?>,
            true
        );
        xhttp.send();
        xhttp.onload = function () {
            if (this.status == 200) {
                if(departures != null){
                    departures.innerHTML = this.responseText;
                    addHeader();
                }
            }
        };
        var xhttp = new XMLHttpRequest();
        xhttp.open(
            'GET',
            'index.php?api=arrivals&id=' +
                <?= $_GET['id'] ?>,
            true
        );
        xhttp.send();
        xhttp.onload = function () {
            if (this.status == 200) {
                if(arrivals!= null){
                    arrivals.innerHTML = this.responseText;
                    addHeader();
                }
            }
        };
        
    }
    
    function addHeader(){
        if(document.fullscreenElement){
            let header = document.createElement('h2');
            let switchButton = document.getElementsByClassName('switch')[0];
            if (document.fullscreenElement == departures) {
                element = departures;
                header.innerHTML = switchButton.children[2].innerText;
            } else {
                element = arrivals;
                header.innerHTML = switchButton.children[3].innerHTML;
            }
            element.prepend(header);
            element.addEventListener("fullscreenchange", function () {
                if (!document.fullscreenElement) {
                    header.remove();
                }
            });
        }
    }

    document.onload = loadBoard();
    setInterval(loadBoard, 10000);

</script>