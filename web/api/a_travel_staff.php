<!DOCTYPE html>
<html>
<body>

    <?php
    
    require_once(PATH_MODELS . 'StaffDAO.php');

    $staff = new StaffDAO();
    $freeStaff = $staff->getFreeDriver(intval($_GET['time']), $_GET['datetime']);
    ?>
    <table>
        <tr>
            <th>Id</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th></th>
        </tr>
    <?php
    foreach ($freeStaff as $driver) {
        $data = $staff->getDriverDetails($driver['DRIVER_ID']);
        ?>
        <tr>
            <td><?= $data['DRIVER_ID'] ?></td>
            <td><?= $data['USER_FIRSTNAME'] ?></td>
            <td><?= $data['USER_LASTNAME'] ?></td>
            <td><input type="radio" name="driver_id" value="<?= $data['DRIVER_ID'] ?>"></td>
        <?php
        }
        ?>
     </table>