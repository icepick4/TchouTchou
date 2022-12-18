<?php

require_once(PATH_MODELS . 'StationDAO.php');

$train = new StationDAO();

$stations = $train->get_stations();

if (isset($_POST['date'])) {
}
require_once(PATH_VIEWS . $page . '.php');
