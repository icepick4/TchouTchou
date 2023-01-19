<!DOCTYPE html>
<html>
<body>

    <?php
    
    require_once(PATH_MODELS . 'TrainDAO.php');

    $trains = new TrainDAO();
    $freeTrain = $trains->getFreeTrain(intval($_GET['time']), $_GET['datetime'], $_GET['driver_id']);
    
    ?>
    <table>
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Capacité</th>
            <th>Vitesse</th>
            <th>Longueur</th>
            <th></th>
        </tr>
    <?php
    foreach ($freeTrain as $train) {
        $data = $trains->getTrainDetails($train['TRAIN_ID']);
        ?>
        <tr>
            <td><?= $data['TRAIN_ID'] ?></td>
            <td><?= $data['TRAIN_TYPE_LABEL'] ?></td>
            <td><?= $data['TRAIN_CAPACITY'] ?></td>
            <td><?= $data['TRAIN_SPEED'] ?></td>
            <td><?= $data['TRAIN_LENGTH'] ?></td>
            <td><input type="radio" name="driver_id" value="<?= $data['DRIVER_ID'] ?>"></td>
        <?php
        }
        ?>
     </table>