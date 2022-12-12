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

<!--  Fin de la page -->

<!--  Pied de page -->

<?php require_once(PATH_VIEWS . 'footer.php');
