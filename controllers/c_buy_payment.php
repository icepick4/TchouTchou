<?php
require_once(PATH_VIEWS . $page . '.php');
require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'StationDAO.php');
//si le paiment est validé, on ajoute un billet à la base de données
$station = new StationDAO();
$station_name = $station->getStationName($_POST['to']);
if (isset($_GET['payment'])) {
    $travel_id = $_GET['travel'];
    $from_id = $_GET['from'];
    $to_id = $_GET['to'];
    $user_id = $_SESSION['user_id'];
    $user = new UserDAO();
    $user->addTicket($user_id, $travel_id, $from_id, $to_id, $place, $_SESSION['first_name'], $_SESSION['last_name']);
    
}
