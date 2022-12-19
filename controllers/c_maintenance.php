<?php
require_once(PATH_MODELS . 'TrainDAO.php');
require_once(PATH_MODELS . 'UserDAO.php');
$train = new TrainDAO();
$user = new UserDAO();

$trains = $train->get_trains();
if ($_SESSION['logged'] && $user->isService($_SESSION['user_id'])) {
    if(isset($_POST['status'])){
    
        $status = $_POST['status'];
        $train_id = $_POST['train_id'];
        $train->update_train_status($status, $train_id);
    }
} else {
    header("Location: index.php?page=home");
    die();
}

require_once(PATH_VIEWS . $page . '.php');
