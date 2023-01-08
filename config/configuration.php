<?php
require_once('config/config_connection.php');
const DEBUG = true; // production : false; dev : true


error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Langue du site
// echo $_SERVER['HTTP_ACCEPT_LANGUAGE'];
define('LANG', substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], strpos($_SERVER['HTTP_ACCEPT_LANGUAGE'], '-') - 2, 5));

// Paramètres du site : nom de l'auteur ou des auteurs
const AUTEUR = 'TchouTchou';
const verif = 214428544845492;
//dossiers racines du site
define('PATH_CONTROLLERS', './controllers/c_');
define('PATH_ENTITY', './entities/');
define('PATH_ASSETS', './assets/');
define('PATH_LIB', './lib/');
define('PATH_MODELS', './models/');
define('PATH_VIEWS', './views/v_');
define('PATH_CONST', './config/');
define('PATH_TEXTES', './languages/');
define('PATH_JS', './assets/js/');
define('PATH_MAILER', './PHPMailer/');
define('PATH_API','./api/a_');
//future
//define('PATH_API','./api/a_');

//sous dossiers
define('PATH_CSS', PATH_ASSETS . 'css/');
define('PATH_IMAGES', PATH_ASSETS . 'images/');
define('PATH_SCRIPTS', PATH_ASSETS . 'js/');

//fichiers
define('PATH_LOGO', PATH_IMAGES . 'fav.png');
define('PATH_MENU', PATH_VIEWS . 'menu.php');

// essaie d'utiliser le fichier config global pour ajax
if (!isset($skipSession)) {
    session_start();
}

// session_start();
if (!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = false;
    $_SESSION['user_id'] = null;
}


