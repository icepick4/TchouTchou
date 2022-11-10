<?php
require_once(PATH_MODELS.'user.php');

if (!$_SESSION['logged']) {
    // $page = "login";  enlever commentaire un fois gestion de compte fini
}else{
    $user = new UserDAO(true);
    $result = $user->getUserId($_SESSION['user_id']);
}



require_once(PATH_VIEWS.$page.'.php'); 
