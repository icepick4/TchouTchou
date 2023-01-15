<?php require_once(PATH_VIEWS . 'header.php'); 
?>
<script src=<?= PATH_JS . $page . '.js' ?> type="module" defer></script>

<div class="top-bar">
<button onclick="document.location.href='index.php?page=staff'"><?= BTN_RETURN ?></button>
<h1 id="title" name=<?= $driver_id ?>><?= $driver_name ?></h1>
<p></p>
</div>


<div class="abilities-card">
	<h2><?= ABILITIES ?></h2>
	<div class="abilities-list">
		<?php 
		foreach ($driver_abilities as $ability) {		
		?>
		<div class="abilitie">
		 <label class="abilities_name"><?= $ability['TRAIN_TYPE_LABEL'] ?></label>
		 <input 
		 <?php if($ability['DRIVER_ABILITY'] == 1){ ?> checked <?php } ?>
		 type="checkbox" value="<?= $ability['TRAIN_TYPE_ID'] ?>">
		</div>
		<?php
		}
		?>
		

	</div>
</div>

<div class="top-bar">
	<p></p>
<button id="SUBMIT"><?= SUBMIT ?></button>

<button id="DELETE"><?= BTN_DELETE ?></button>

</div>


<?php
require_once(PATH_VIEWS . 'footer.php');