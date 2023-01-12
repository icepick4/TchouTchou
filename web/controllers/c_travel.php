<?php
require_once(PATH_MODELS . 'StaffDAO.php');
$staff = new StaffDAO();

if ($staff->isAdministrator($_SESSION['user_id'])) {
    require_once(PATH_VIEWS . $page . '.php');
} else {
    header("Location: index.php?page=home");
    die();
}



