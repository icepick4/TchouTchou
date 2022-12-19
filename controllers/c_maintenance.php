<?php
require_once(PATH_MODELS . 'TrainDAO.php');
require_once(PATH_MODELS . 'UserDAO.php');
$train = new TrainDAO();
$user = new UserDAO();

$trains = $train->get_trains();
$train_types = $train->get_all_trains_type();
if ($_SESSION['logged'] && $user->isService($_SESSION['user_id'])) {
    if(isset($_POST['status'])){
    
        $status = $_POST['status'];
        $train_id = $_POST['train_id'];
        $train->update_train_status($status, $train_id);
    }
    if(isset($_POST['train_type'])){
        $train_type = $_POST['train_type'];
        $train->add_train($train_type);
        header("Location: index.php?page=maintenance");
    }
} else {
    header("Location: index.php?page=home");
    die();
}

require_once(PATH_VIEWS . $page . '.php');
