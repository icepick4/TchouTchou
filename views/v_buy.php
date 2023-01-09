<!--  Entête de la page -->
<?php
require_once(PATH_VIEWS . 'header.php');

?>

<script src=<?= PATH_JS . 'buy.js' ?> type="module" defer></script>


<!--  Début de la page -->
<div class="input-container">

    <form method="post" action="index.php?page=buy" id="form">
        <div class="container">
            <input type="text" id="search1" autocomplete="off" placeholder="<?= START_STATION ?>" name="from" class="search" <?php if (isset($_POST['from'])) {
                                                                                                                                    echo 'value="' . $_POST['from'] . '"';
                                                                                                                                } ?>>
            <i class="clear-search">X</i>
        </div>
        <a id="boxArrow"><img src="<?= PATH_IMAGES . "exchangeArrow.svg" ?>" id="exchangArrow"></a>
        <div class="container">
            <input type="text" id="search2" autocomplete="off" placeholder="<?= END_STATION ?>" name="to" class="search" <?php if (isset($_POST['to'])) {
                                                                                                                                echo 'value="' . $_POST['to'] . '"';
                                                                                                                            } ?>>
            <i class="clear-search">X</i>
        </div>
        <input type="date" name="date" id="date" <? if (isset($_POST['date'])) echo 'value="' . $_POST['date'] . '"'; ?> />
        <div id="SeatCounterContainer">
            <button class="buttonNumber" type="button" onclick="this.parentNode.querySelector('[type=number]').stepDown();">-</button>
            <input type="number" name="nbr" placeholder="1" min="1" max="10" <?php if (isset($_POST['nbr'])) {
                                                                                    echo 'value="' . $_POST['nbr'] . '"';
                                                                                } else {
                                                                                    echo 'value="1"';
                                                                                } ?> />
            <button class="buttonNumber" type="button" onclick="this.parentNode.querySelector('[type=number]').stepUp();">+</button>
        </div>
        <input type="submit" value="<?= SEARCH_TRAVEL ?>" id="submit" />
    </form>
</div>
<label class="info" id="error-stations"><?= ERROR_STATIONS ?></label>
<label class="info" id="error-date"><?= ERROR_DATE ?></label>
<label class="info" id="error-empty-input"><?= EMPTY_INPUT_BUY ?></label>
<label class="info" id="error-wrong-stations"><?= WRONG_STATIONS ?></label>
<?php
if (!isset($_POST['date']) and !isset($_POST['from']) and !isset($_POST['to']) and empty($_POST['date'])) {
?>
    <img src="<?php echo PATH_IMAGES . "searchmap.svg" ?>" id="main-img">
<?php
};
?>
<div class="tickets">
    <?php if (isset($_POST['date'])  and $trains == null) echo "<h1>" . NO_TRAVEL_FOUND . "</h1>"; ?>
    <?php
    for ($i = 0; $i < count($trains); $i++) {
    ?>

        <div class="ticket-container <?php if ($trains[$i]['EMPTY_SEATS']['EMPTYSEATS'] < $_POST['nbr']) echo "disabled" ?>">
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
                <p><?= $trains[$i]['TRAIN_TYPE_LABEL'] ?></p>
                <p><?= intval($trains[$i]['PRICE']) * intval($_POST['nbr']) . ' €' ?></p>
            </div>
            <div>
                <form action="index.php?page=buy_place" method="post">
                    <input type="hidden" name="travel" value="<?= $trains[$i]['TRAVEL_ID'] ?>">
                    <input type="hidden" name="line" value="<?= $trains[$i]['LINE_ID'] ?>">
                    <input type="hidden" name="from" value="<?= $from_id ?>">
                    <input type="hidden" name="to" value="<?= $to_id ?>">
                    <input type="hidden" name="price" value="<?= intval($trains[$i]['PRICE']) * intval($_POST['nbr']) ?>">
                    <input type="hidden" name="nbr" id="nbr" value="<?= $_POST['nbr'] ?>">
                    <input type="hidden" name="date" id="date" value="<?= $_POST['date']; ?>" />
                    <input type="submit" value="<?= BUY ?>">
                </form>
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
