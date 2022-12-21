<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>


<!--  Début de la page -->
<div class="input-container">
    <form method="post" action="index.php?page=purchase" id="form">
        <select name="from">
            <?php
            foreach ($stations as $station) {
            ?>
                <option values=<?= $station['STATION_NAME'] ?>>
                    <?= $station['STATION_NAME'] ?>
                </option>
            <?php
            }
            ?>
        </select>
        <select name="to">
            <?php
            foreach ($stations as $station) {
            ?>
                <option values=<?= $station['STATION_NAME'] ?>>
                    <?= $station['STATION_NAME'] ?>
                </option>
            <?php
            }
            ?>
        </select>
        <input type="date" name="date" />
        <input type="submit" value="Rechercher les billets" />
    </form>
</div>
<img src="<?php echo PATH_IMAGES . "searchmap.svg" ?>">
<div class="tickets">
    <?php
    for ($i = 0; $i < count($trains); $i++) {
    ?>
        <div class="ticket-container">
            <p <?= $from ?>>
            <p <?= $to ?>>
            <p><?= $trains[$i]['START_TIME'] ?></p>
            <p><?= $trains[$i]['PRICE'] ?></p>
            <a href="index.php?page=payment&travel=<?= $trains[$i]['TRAVEL_ID'] ?>&from=<?= $from_id ?>&to=<?= $to_id ?>">Acheter</a>
        </div>
    <?php
    }
    ?>
</div>


<!--  Fin de la page -->

<!--  Pied de page -->

<?php require_once(PATH_VIEWS . 'footer.php');
