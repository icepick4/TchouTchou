<?php
/*
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 * menu: http://www.w3schools.com/bootstrap/bootstrap_ref_comp_navs.asp
 */
?>
<!-- Menu du site -->

<nav class="">
  <div class="">
    <ul class="">
				<li <?php echo ($page=='accueil' ? 'class=""':'')?>>
					<a href="index.php">
						<?= MENU_ACCUEIL ?>
					</a>
				</li>
				<li <?php echo ($page=='test' ? 'class=""':'')?>>
					<a href="index.php?page=test">
						page inexistante
					</a>
				</li>
    </ul>
  </div>
</nav>


