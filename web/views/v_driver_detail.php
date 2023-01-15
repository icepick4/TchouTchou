<?php require_once(PATH_VIEWS . 'header.php'); 
?>

<div class="top-bar">
<button onclick="document.location.href='index.php?page=staff'"><?= BTN_RETURN ?></button>
<h1><?= $driver_name ?></h1>
<p></p>
</div>

<?php
require_once(PATH_VIEWS . 'footer.php');