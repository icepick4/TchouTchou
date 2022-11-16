<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="Language" content="<?= LANG ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= TITLE ?></title>
  <link rel="shortcut icon" type="image/png" href="<?php echo PATH_IMAGES . "favicon.ico" ?>" />
  <link href="<?php echo PATH_CSS . "common.css" ?>" rel="stylesheet" />
  <link href="<?php echo PATH_CSS . "header.css" ?>" rel="stylesheet" />
  <link href="<?php echo PATH_CSS . "footer.css" ?>" rel="stylesheet" />
  <link href="<?php echo PATH_CSS . $page .".css" ?>" rel="stylesheet"/>
  <script language="javascript" src="<?php echo PATH_SCRIPTS ."hover.js"?>"></script>
</head>
<body>
  <header>
    <nav>
      <a href="index.php?page=home">
        <img src="<?php echo PATH_IMAGES . "logo_orange.svg" ?>" class="logo">
      </a>
      <ul>
        <li><a href="index.php?page=home"><?php echo TITLE_HOME ?></a></li>
        <li><a href="index.php?page=purchase"><?php echo TITLE_PURCHASE ?></a></li>
        <li><a href="index.php?page=informations"><?php echo TITLE_INFORMATION ?></a></li>
      </ul>
    </nav>
    <nav>
      <a href="index.php?page=account"><img src="<?php echo PATH_IMAGES . "account_orange.svg" ?>" class="logo"></a>
      <a href="index.php?page=shopping"><img src="<?php echo PATH_IMAGES . "shopping_orange.svg" ?>" class="logo"></a>
    </nav>
  </header>
  <section id="main">