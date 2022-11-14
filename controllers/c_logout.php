<?php

$_SESSION['logged'] = false;

header("Location: index.php?page=login");
die();