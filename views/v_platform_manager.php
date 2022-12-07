<?php
require_once(PATH_VIEWS . 'header.php');
?>

<script src=<?= PATH_JS . 'platform_manager.js' ?> type="module" defer></script>

<h2>gestionaire de quais</h2>
<div class="control_pannel">
	<fieldset>
		<legend>paneaux de configuration</legend>
		<div class="select_option">
			<select id="station_name">
				<?php
				if ($stations != null) {
					foreach ($stations as $station) {
				?>
						<option><?= $station['STATION_NAME'] ?></option>
				<?php }
				} ?>
			</select>
			<select id="hub_id" class="loading"></select>
			<select id="station_name"></select>
		</div>

	</fieldset>
	<div class="ihm_quais">
		<fieldset>
			<legend>platforms</legend>
		</fieldset>
	</div>
</div>


<?php require_once(PATH_VIEWS . 'footer.php'); ?>