<!DOCTYPE html>
<?php require_once(PATH_MODELS . 'UserDAO.php'); ?>
<?php require_once(PATH_MODELS . 'StaffDAO.php'); ?>
<html lang=<?= '"' . substr(LANG, 0, 2) . '"' ?>>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="Language" content="<?= LANG ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    <?= TITLE ?>
  </title>
  <link rel="shortcut icon" type="image/png" href="<?= PATH_IMAGES . "favicon.ico" ?>" />
  <link href="<?= PATH_CSS . "common.css" ?>" rel="stylesheet" />
  <link href="<?= PATH_CSS . "header.css" ?>" rel="stylesheet" />
  <link href="<?= PATH_CSS . "footer.css" ?>" rel="stylesheet" />
  <link href="<?= PATH_CSS . "modal.css" ?>" rel="stylesheet" />
  <link href="<?= PATH_CSS . $page . ".css" ?>" rel="stylesheet" />
</head>
<script src=<?= PATH_JS . 'header.js?flag=' . $_SESSION['user_id'] ?> type="module" defer></script>

<body>
  <header>
    <nav>
      <div class="logos">
        <a href="index.php?page=home" class="logo" id="logo-home">
          <?= SVG_LOGO ?>
        </a>
        <button id="header-button">
          <img src="<?= PATH_IMAGES . "arrow.png" ?>" alt="arrow-header" />
        </button>
      </div>
      <ul>
        <li><a href="index.php?page=buy"><?= TITLE_PURCHASE ?></a></li>
        <li id="account-text"><a href="index.php?page=account"><?= MY_ACCOUNT ?></a></li>
        <?php
        $user = new UserDAO();
        $staff = new StaffDAO();
        if (!$staff->isEmployee($_SESSION['user_id'])) {
          echo '<li><a href="index.php?page=informations">' . TITLE_INFORMATION . '</a></li>';
        } ?>
        <li><a href="index.php?page=station_list"><?= TITLE_STATION_LIST ?></a></li>
        <?php
        if (isset($_SESSION['user_id'])) {
          echo '<li><a href="index.php?page=messages">' . MY_MESSAGES . '</a></li>';
        } ?>
        <?php
        if (isset($_SESSION['user_id']) && ($staff->isStation($_SESSION['user_id']) || $staff->isAdministrator($_SESSION['user_id']))) {
          echo '<li><a href="index.php?page=platform_manager">' . TITLE_PLATFORM_MANAGER . '</a></li>';
        }
        if (isset($_SESSION['user_id']) && ($staff->isService($_SESSION['user_id']) || $staff->isAdministrator($_SESSION['user_id']))) {
          echo '<li><a href="index.php?page=maintenance">' . TITLE_MAINTENANCE . '</a></li>';
        }
        if (isset($_SESSION['user_id']) && $staff->isService($_SESSION['user_id']) || $staff->isStation($_SESSION['user_id']) || $staff->isAdministrator($_SESSION['user_id'])) {
          echo '<li><a href="index.php?page=alert_list">' . ALERT_LIST . '</a></li>';
        }
        if (isset($_SESSION['user_id']) && ($staff->isHumanResource($_SESSION['user_id']) || $staff->isAdministrator($_SESSION['user_id']))) {
          echo '<li><a href="index.php?page=staff">' . TITLE_STAFF . '</a></li>';
        }
        if (isset($_SESSION['user_id']) && $staff->isDriver($_SESSION['user_id'])) {
          echo '<li><a href="index.php?page=planning_driver">' . TITLE_PLANNING . '</a></li>';
          echo '<li><a href="index.php?page=alert_trigger">' . TITLE_ALERT . '</a></li>';
        } ?>
      </ul>
    </nav>
    <nav>
      <a href="index.php?page=<?= $_SESSION['logged'] ? "account" : "login" ?>" class="logo" id="account-logo">
        <?= SVG_ACCOUNT ?>
      </a>
    </nav>
  </header>
  <div id="lang">
    <p id="LOGIN_NEEDED"> <?= LOGIN_NEEDED ?> </p>
  </div>


  <section id="main">