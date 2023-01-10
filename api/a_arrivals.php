<!DOCTYPE html>
<html>

<body>

    <?php


    require_once(PATH_MODELS . 'StationDAO.php');
    $train = new StationDAO();
    $arrivalTravels = $train->get_station_arrivals($_GET['id']); ?>

                <table>
                    <tbody>
                        <?php
                        foreach ($arrivalTravels as $travel) { ?>
                            <tr>
                                <td><?= SVG_LOGO ?></td>
                                <td>
                                    <p><? if ($travel['LATE_TIME'] == null) {
                                            echo ON_TIME;
                                        } else {
                                            echo DELAY_OF . $travel['LATE_TIME'] . MIN;
                                        }  ?></p>
                                    <p>n°<?= $travel['TRAIN_ID'] ?></p>
                                </td>
                                <td>
                                    <h4><?= $travel['ARRIVAL_TIME']) ?></h4>
                                </td>
                                <td>
                                    <h3><?= $travel['DESTINATION'] ?></h3>
                                    <p><? if ($travel['LATE_TIME'] == null) {
                                            echo ON_TIME;
                                        } else {
                                            echo DELAY_OF . $travel['LATE_TIME'] . MIN;
                                        }  ?></p>
                                </td>
                                <td><? $platform = $train->get_platform_used_for_travel($travel['TRAVEL_ID'], $_GET['id']);
                                    if ($platform['PLATFORM_LETTER'] != null)
                                        echo "<p>" . $platform['PLATFORM_LETTER'] . "</p>"; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
