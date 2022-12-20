<?php
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'PlanningDAO.php');
$user = new UserDAO();
$planning = new PlanningDAO();

$driver = $user->getDriverID($_SESSION['user_id']);
$date = $planning->getSysdate();

require_once(PATH_VIEWS . $page . '.php');
