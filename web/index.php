<?php
/*
 * MODULE DE PHP
 * Index du site
 *
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

// Initialisation des paramètres du site
require_once('./config/configuration.php');
require_once('./lib/foncBase.php');
require_once(PATH_TEXTES . LANG . '.php');
require_once(PATH_IMAGES . 'svg.php');

$type = 'page';
//vérification de la page demandée 
if (isset($_GET['page'])) {
  $page = htmlspecialchars($_GET['page']); // http://.../index.php?page=toto
  if (!is_file(PATH_CONTROLLERS . $_GET['page'] . ".php")) {
    $page = '404'; //page demandée inexistante
  }
} else if (isset($_GET['api'])) {
  $page = htmlspecialchars($_GET['api']); // http://.../index.php?page=toto
  if (!is_file(PATH_API . $_GET['api'] . ".php")) {
    $page = '404'; //page demandée inexistante
  } else {
    $type = 'api';
  }
} else
  $page = 'home'; //page d'accueil du site - http://.../index.php

//appel du controller
if ($type == 'api') {
  require_once(PATH_API . $page . '.php');
} else {
  require_once(PATH_CONTROLLERS . $page . '.php');
  require_once(PATH_VIEWS . 'go_up.php');
}

