<!--  Entête de la page -->
<?php 
require_once(PATH_VIEWS . 'header.php'); 

?>

<script src=<?= PATH_JS . 'purchase.js' ?> type="module" defer></script>

<!--  Début de la page -->
<div class="input-container">
    <form method="post" action="index.php?page=purchase" id="form">
    <div class="container">
        <input type="text" id="search1" autocomplete="off" placeholder="<?= SEARCH ?>" name="from" class="search">
        <i class="clear-search">X</i>
    </div>
    <div class="container">
        <input type="text" id="search2" autocomplete="off" placeholder="<?= SEARCH ?>" name="to" class="search">
        <i class="clear-search">X</i>
    </div>
        <input type="date" name="date" />
        <div id="SeatCounterContainer">
            <button type="button" onclick="this.parentNode.querySelector('[type=number]').stepDown();">-</button>
            <input type="number" name="nbr" placeholder="1" min="1" max="10" value="1"/>
            <button type="button" onclick="this.parentNode.querySelector('[type=number]').stepUp();">+</button>
        </div>
        <input type="submit" value="Rechercher les billets" />
    </form>
</div>
<?php
    if (!isset($_POST['date']) and !isset($_POST['from']) and !isset($_POST['to']) and empty($_POST['date'])) {
?>
    <img src="<?php echo PATH_IMAGES . "searchmap.svg" ?>">
<?php
}
;
?>
<div class="tickets">
    <?php
    for ($i = 0; $i < count($trains); $i++) {
    ?>
    
        <div class="ticket-container">
            <div>
                <div>
                    <div>
                        <p><?= $trains[$i]['START_TIME'] ?></p>
                        <p><?= $from ?></p>
                    </div>
                    <div>
                        <p><?= $trains[$i]['DURATION'] ?></p>
                    </div>
                    <div>
                        <p><?= $trains[$i]['END_TIME'] ?></p>
                        <p><?= $to ?></p>
                    </div>
                </div>
                <div>
                <img src="<?php echo PATH_IMAGES . "seat.svg" ?>">
<p><?= $trains[$i]['EMPTY_SEATS']['EMPTYSEATS'] ?></p>
                </div>
            </div>
            <div>
            <p><?= intval($trains[$i]['PRICE'])*intval($_POST['nbr']).' €' ?></p>
            </div>
            <div>
                <a href="index.php?page=payment&travel=<?= $trains[$i]['TRAVEL_ID'] ?>&from=<?= $from_id ?>&to=<?= $to_id ?>">Acheter</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>


<p id="stationsArray" style="display:none"><?php 
    foreach ($stations as $station) {
        echo $station['STATION_NAME'] . '//';
    }
    ?></p>

<!--  Fin de la page -->

<!--  Pied de page -->

<?php require_once(PATH_VIEWS . 'footer.php');
