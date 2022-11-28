<?php

require_once(PATH_MODELS . 'TrainDAO.php');

$train = new TrainDAO();

$stations = $train->get_stations();

// for ($i = 0; $i < count($stations); $i++) {
//     $stations[$i]['CITY_NAME'] = $train->get_city_name($stations[$i]['CITY_ID'])['CITY_NAME'];
// }


require_once(PATH_VIEWS . $page . '.php');
