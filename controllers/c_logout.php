<?php

$_SESSION['logged'] = false;
$_SESSION['user_id'] = null;
header("Location: index.php?page=home");
die();
