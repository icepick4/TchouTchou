<?php require_once(PATH_VIEWS . 'header.php'); 
?>

<div class="top-bar">
<button onclick="document.location.href='index.php?page=staff'"><?= BTN_RETURN ?></button>
<h1><?= $driver_name ?></h1>
<p></p>
</div>


<div class="abilities-card">
	<h2>abilities</h2>
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

<button ><?= BTN_RETURN ?></button>

<?php
require_once(PATH_VIEWS . 'footer.php');