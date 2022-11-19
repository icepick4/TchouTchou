<?php

require_once(PATH_VIEWS . 'header.php');

if ($stations != null) {
?>
    <table>
        <tr>
            <td>Station</td>
            <td>City</td>
            <td>Region</td>
            <td>Country</td>
        </tr>
        <?php
        foreach ($stations as $station) {
        ?>

            <tr>
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
}

require_once(PATH_VIEWS . 'footer.php');
