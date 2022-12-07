<?php

if (isset($alert)) {
	if (isset($alert["typeAlert"]) && $alert["typeAlert"] == "form") {
?>
		<div class="alert alert-form">
			<strong><?= $alert['messageAlert'] ?></strong>
		</div>

	<?php
	} else {
	?>
		<div class="alert">
			<strong><?= $alert['messageAlert'] ?></strong>
			<img src="<?php echo PATH_IMAGES . "alert.svg" ?>">
		</div>

<?php
	}
}
