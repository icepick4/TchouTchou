<!DOCTYPE html>
<?php require_once(PATH_MODELS . 'UserDAO.php'); ?>
<html lang=<?='"'.substr(LANG,0,2).'"' ?>>
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
  <script src=<?= PATH_JS . 'cart.js' ?> type="module" defer></script>
</head>

<body>
  <header>
    <nav>
      <a href="index.php?page=home" class="logo"><?= SVG_LOGO ?></a>
      <ul>
        <li><a href="index.php?page=purchase"><?php echo TITLE_PURCHASE ?></a></li>
        <li><a href="index.php?page=informations"><?php echo TITLE_INFORMATION ?></a></li>
        <li><a href="index.php?page=station_list"><?php echo STATION_LIST ?></a></li>
        <?php
          if (isset($_SESSION['user_id'])) {
            echo '<li><a href="index.php?page=messages">' . TITLE_MESSAGES . '</a></li>';
          }?>
        <?php
        $user = new UserDAO();
          if (isset($_SESSION['user_id']) && $user->isStation($_SESSION['user_id'])) {
            echo '<li><a href="index.php?page=platform_manager">' . TITLE_PLATFORM_MANAGER . '</a></li>';
          }
          if (isset($_SESSION['user_id']) && $user->isService($_SESSION['user_id'])) {
            echo '<li><a href="index.php?page=maintenance">' . TITLE_MAINTENANCE . '</a></li>';
          }
          if (isset($_SESSION['user_id']) && $user->isDriver($_SESSION['user_id'])) {
            echo '<li><a href="index.php?page=planning_driver">' . TITLE_PLANNING . '</a></li>';
          }
          if (isset($_SESSION['user_id']) && $user->isDriver($_SESSION['user_id'])) {
            echo '<li><a href="index.php?page=alert_trigger">' . TITLE_ALERT . '</a></li>';
          }?>
      </ul>
    </nav>
    <nav>
      <a href="index.php?page=<?php echo $_SESSION['logged'] ? "account" : "login" ?>" class="logo"><?= SVG_ACCOUNT ?></a>
      <div id="shop" class="logo"><?= SVG_SHOPPING ?></div>
    </nav>
  </header>

  <div id="cart" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-header">
        <h2><?= CART ?></h2>
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>


  <section id="main">