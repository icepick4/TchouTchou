<?php
require_once(PATH_MODELS . 'StaffDAO.php');
require_once(PATH_MODELS . 'CustomerDAO.php');
$staff = new StaffDAO();

print_r($staff->getAllStaffSlpied());