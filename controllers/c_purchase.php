<?php

require_once(PATH_MODELS . 'TrainDAO.php');

$train = new TrainDAO();

$stations = $train->get_stations();

if (isset($_POST['date'])) {
}
require_once(PATH_VIEWS . $page . '.php');
