<?php
$_SESSION['logged'] = false;
$_SESSION['user_id'] = null;
header("Location: index.php?page=home");
die();?>
<script src=<?= PATH_JS . 'logout.js' ?> type = "module" defer ></script>
