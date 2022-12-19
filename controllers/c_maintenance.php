<?php
require_once(PATH_MODELS . 'TrainDAO.php');

$train = new TrainDAO();

$trains = $train->get_trains();

if(isset($_POST['status'])){
    
    $status = $_POST['status'];
    $train_id = $_POST['train_id'];
    $train->update_train_status($status, $train_id);
    header('Location: index.php?page=maintenance');
}

require_once(PATH_VIEWS . $page . '.php');
