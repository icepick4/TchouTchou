<?php
require_once(PATH_LIB . 'connexionBDD.php');

if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {

    
}



require_once(PATH_VIEWS . $page . '.php');
