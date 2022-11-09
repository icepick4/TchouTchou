<?php

if(isset($alert))
{
?>
	<div class="alert">
		<strong><?= $alert['messageAlert'] ?></strong>
		<img src="<?php echo PATH_IMAGES."alert.svg"?>">
	</div>
	
<?php
}
