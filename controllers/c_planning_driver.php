<?php
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_MODELS . 'StaffDAO.php');
require_once(PATH_MODELS . 'PlanningDAO.php');
$staff = new StaffDAO();
$planning = new PlanningDAO();

$driver = $staff->getDriverID($_SESSION['user_id']);
$date = $planning->getSysdate();

require_once(PATH_VIEWS . $page . '.php');
