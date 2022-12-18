<?php

require_once(PATH_MODELS . 'StationDAO.php');

$train = new StationDAO();

$stations = $train->get_stations();

require_once(PATH_VIEWS . $page . '.php');
