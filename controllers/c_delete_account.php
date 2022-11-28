<?php

require_once(PATH_MODELS . 'UserDAO.php');
$user = new UserDAO(true);
$user->deleteUser($_SESSION['user_id']);
$_SESSION = array();
header("Location: index.php?page=login");
