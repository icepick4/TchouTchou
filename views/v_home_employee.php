<!--  Entête de page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!-- Début de la page -->

<div class="main">
	<article>
		<img src="assets/images/work_il.svg">
		<div class="arti">
			<h2><?=WELCOME?></h2>
			<p><?=WELCOME_TEXT?></p>
		</div>
	</article>
	<article>
		<img src="assets/images/station_il.svg">
		<div class="arti">
			<h2>PLATFORM_MANAGER</h2>
			<p><?=PLATFORM_MANAGER_TEXT?></p>
			<a href="">
				<div class="btn">
					<p><?=WELCOME_GO?></p>
					<img src="assets/images/arrow.svg">
				</div>
			</a>
		</div>
	</article>
	<article>
		<img src="assets/images/engineer_il.svg">
		<div class="arti">
			<h2><?=MAINTENANCE?></h2>
			<p><?=MAINTENANCE_TEXT?></p>
			<div class="btn">
				<p><?=WELCOME_GO?></p>
				<img src="assets/images/arrow.svg">
			</div></a>
		</div>
	</article>
</div>

<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php'); ?>