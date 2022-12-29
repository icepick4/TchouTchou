<!--  Entête de la page -->
<?php
require_once(PATH_VIEWS . 'header.php');
?>

<script src=<?= PATH_JS . 'platform_manager.js' ?> type="module" defer></script>


<!--  Début de la page -->


<h2 id="title"><?=PLATFORM_MANAGER_TITLE?></h2>
<div class="control_pannel">
	<fieldset>
		<legend><?=CONFIG_PANNEL?></legend>
		<div class="select_option">
			<h3><?=SELECT_STATION?></h3>
			<h3><?=SELECT_HUB?></h3>
			<select id="station_name">
				<?php
				if ($stations != null) {
					foreach ($stations as $station) {

				?>
						<option value='<?= $station['STATION_ID'] ?>'><?= $station['STATION_NAME'] ?></option>
				<?php }
				} ?>
			</select>
			<select id="hub_id" class="loading"></select>
		</div>

	</fieldset>

	<fieldset>
		<legend><?=APPROACHING_TRAIN?></legend>
		<div id="approching-list">
			<div class="approching-train">
				<p>Train nb</p>
				<select>
					<option>None</option>
				</select>
			</div>
		</div>
	</fieldset>
</div>
<div class="ihm_quais">
	<fieldset>
		<legend><?=PLATFORMS?></legend>

		<div class="aiguillage">


	<div class="suport_rail">
		<div id="reference"></div>
		<div class="start"></div>
		<div class="finish"></div>
		<div id="connection-liste"></div>
		<template id="connection">
			<svg class="rail">
			  <line x1="50" y1="100" x2="200" y2="10" class="arrow" />
			</svg>
		</template>
	</div>
	<div class="list_quai"></div>
	<template id="platforms">

		<div class="quai block">

			<div class="quai_info">
				<label id="letter"><?=LETTER?></label>
				<button class="btn_actif"><p><?=CLOSE?></p></button>
				<div class="train_icon_box">

					<img class="logo_train  no_train " src="assets/images/logo_simple_train.svg">

				</div>
			<label class="train_number"><?=TRAIN_NUMBER?></label>
			</div>
		</div>
	</template>	
		</div>
	</fieldset>
	
</div>

<!--  Fin de la page -->

<div class="lang">
	<p id="CLOSE"><?=CLOSE?></p>
	<p id="OPEN"><?=OPEN?></p>
	<p id="CONFIRM"><?=CONFIRM?></p>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php'); ?>