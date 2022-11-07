<?php
 
const DEBUG = true; // production : false; dev : true


error_reporting(E_ALL);
ini_set('display_errors','On');


// Accès base de données
const BD_HOST = 'tchoutchou.ovh';
const BD_DBNAME = '';
const BD_USER = 'Tchou';
const BD_PWD = 'Tchoutchou69';
const BD_PORT = '5521';
const BD_SID = 'xe';

// Langue du site
const LANG ='FR-fr';

// Paramètres du site : nom de l'auteur ou des auteurs
const AUTEUR = 'TchouTchou'; 

//dossiers racines du site
define('PATH_CONTROLLERS','./controllers/c_');
define('PATH_ENTITY','./entities/');
define('PATH_ASSETS','./assets/');
define('PATH_LIB','./lib/');
define('PATH_MODELS','./models/');
define('PATH_VIEWS','./views/v_');
define('PATH_CONST','./config/');
define('PATH_TEXTES','./languages/');

//sous dossiers
define('PATH_CSS', PATH_ASSETS.'css/');
define('PATH_IMAGES', PATH_ASSETS.'images/');
define('PATH_SCRIPTS', PATH_ASSETS.'js/');

//fichiers
define('PATH_LOGO', PATH_IMAGES.'fav.png');
define('PATH_MENU', PATH_VIEWS.'menu.php');
