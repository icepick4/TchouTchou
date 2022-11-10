<?php
require_once(PATH_MODELS.'user.php');

$user = new UserDAO(true);
$result = $user->getAllImage();

require_once(PATH_VIEWS.$page.'.php'); 
