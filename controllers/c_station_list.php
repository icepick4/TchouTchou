<?php

require_once(PATH_MODELS . 'TrainDAO.php');

$train = new TrainDAO();

$stations = $train->get_stations();

require_once(PATH_VIEWS . $page . '.php');
