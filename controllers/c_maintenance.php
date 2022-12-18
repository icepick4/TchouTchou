<?php
require_once(PATH_MODELS . 'TrainDAO.php');

$train = new TrainDAO();

$trains = $train->get_trains();

require_once(PATH_VIEWS . $page . '.php');
