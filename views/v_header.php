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
  <link href="<?php echo PATH_CSS . $page . ".css" ?>" rel="stylesheet" />
</head>

<body>
  <header>
    <nav>
      <a href="index.php?page=home" class="logo"><?= SVG_LOGO ?></a>
      <ul>
        <li><a href="index.php?page=purchase"><?php echo TITLE_PURCHASE ?></a></li>
        <li><a href="index.php?page=informations"><?php echo TITLE_INFORMATION ?></a></li>
        <li><a href="index.php?page=station_list"><?php echo STATION_LIST ?></a></li>
      </ul>
    </nav>
    <nav>
      <a href="index.php?page=<?php echo $_SESSION['logged'] ? "account" : "login" ?>" class="logo"><?= SVG_ACCOUNT ?></a>
      <a href="index.php?page=shopping" id="shop" class="logo"><?= SVG_SHOPPING ?></a>
    </nav>
  </header>
  <section id="main">