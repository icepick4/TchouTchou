<!--  Entête de la page -->
<?php
require_once(PATH_VIEWS . 'header.php');
require_once(PATH_MODELS . 'Function.php');

?>
<script src=<?= PATH_JS . 'station_detail.js' ?> type="module" defer></script>

<!--  Début de la page -->
    <div class="container">
        <button onclick="document.location.href='index.php?page=station_list'"><?= RETURN_BUTTON ?></button>
        <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
            <p id="departuresText"><?= DEPARTURES?></p>
            <p id="arrivalsText"><?= ARRIVALS?></p>
        </label>
    </div>
    <?php if(isset($station_name['STATION_NAME'])) {?>
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
            
                <table>
                    <tbody>
                        <?php
                        foreach ($departTravels as $travel) {?>
                        <tr>
                            <td><?= SVG_LOGO ?></td>
                            <td>
                                <p><? if($travel['LATE_TIME'] == null){ echo ON_TIME;}else{ echo DELAY_OF . $travel['LATE_TIME'] . MIN; }  ?></p>
                                <p>n°<?= $travel['TRAIN_ID'] ?></p>
                            </td>
                            <td>
                                <h3><?= strTo24Time($travel['DEPARTURE_TIME']) ?></h3>
                            </td>
                            <td>
                                <h3><?= $travel['DESTINATION'] ?></h3>
                            </td>
                            <td><p>A</p></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <? } else { ?>
                <h2><?= NO_DEPARTURE ?></h2>
                <?php };
            ?></section>
            <section id="arrivals">
                <?php
            if ($arrivalTravels) { ?>
                    <table>
                    <tbody>
                        <?php
                        foreach ($arrivalTravels as $travel) {?>
                        <tr>
                            <td><?= SVG_LOGO ?></td>
                            <td>
                                <p><? if($travel['LATE_TIME'] == null){ echo ON_TIME;}else{ echo DELAY_OF . $travel['LATE_TIME'] . MIN; }  ?></p>
                                <p><?= $travel['TRAIN_ID'] ?></p>
                            </td>
                            <td>
                                <h3><?= strTo24Time($travel['ARRIVAL_TIME']) ?></h3>
                            </td>
                            <td>
                                <h3><?= $travel['DESTINATION'] ?></h3>
                            </td>
                            <td><p>A</p></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                        } else { ?><h2><?= NO_ARRIVAL ?></h2><?php }
            }?></section><?php
        }else{
            echo "<h1>" . STATION_NOT_EXIST . "</h1>";
        } ?>
        
            </section>
            <button id="fullScreenButton"><?= FULL_SCREEN ?></button>

<!--  Fin de la page -->

<!--  Pied de page -->
            <? require_once(PATH_VIEWS . 'footer.php');
