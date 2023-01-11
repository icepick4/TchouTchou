<?php
require_once(PATH_MODELS . 'TrainDAO.php');
require_once(PATH_MODELS . 'StaffDAO.php');
$train = new TrainDAO();
$staff = new StaffDAO();

$trains = $train->getTrains();
$train_types = $train->getAllTrainsType();
if ($_SESSION['logged'] && ($staff->isService($_SESSION['user_id']) || $staff->isAdministrator($_SESSION['user_id']))) {
    if (isset($_POST['status'])) {

        $status = $_POST['status'];
        $train_id = $_POST['train_id'];
        $train->updateTrainStatus($status, $train_id);
        header("Refresh:0");
    }
    if (isset($_POST['train_type'])) {
        $train_type = $_POST['train_type'];
        $train->addTrain($train_type);
        header("Refresh:0");
    }
} else {
    header("Location: index.php?page=home");
    die();
}

require_once(PATH_VIEWS . $page . '.php');
