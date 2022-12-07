<!--  Entête de la page -->
<?php

require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'station_list.js' ?> type="module" defer></script>


<!--  Début de la page -->


<?php
if ($stations != null) {
?>

    <div class="container">
        <input type="text" id="search" placeholder="<?= SEARCH ?>">

        <i id="clear-search">X</i>
    </div>


    <table>
        <tr>
            <th><?= STATION ?></th>
            <th><?= CITY ?></th>
            <th><?= REGION ?></th>
            <th><?= COUNTRY ?></th>
        </tr>
        <?php
        foreach ($stations as $station) {
        ?>
            <tr onclick="document.location.href='index.php?page=station_detail&id=<?= $station['STATION_ID'] ?>'">
                <td>
                    <h3><?php echo $station['STATION_NAME'] ?></h3>
                </td>
                <td>
                    <h3><?php echo $station['CITY_NAME'] ?></h3>
                </td>
                <td>
                    <h3><?php echo $station['REGION_NAME'] ?></h3>
                </td>
                <td>
                    <h3><?php echo $station['COUNTRY_NAME'] ?></h3>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}?>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php
require_once(PATH_VIEWS . 'footer.php');
