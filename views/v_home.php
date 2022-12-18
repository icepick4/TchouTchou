<!--  Entête de page -->
<?php 
	require_once(PATH_VIEWS . 'header.php'); 
	require_once(PATH_MODELS . 'UserDAO.php');

	$user = new UserDAO();

?>


<!-- Début de la page -->

<?php if ($user->isEmployee($_SESSION['user_id'])) {?>
	<article>
		<img src="assets/images/work_il.svg">
		<div class="arti">
			<h2><?=WELCOME?></h2>
			<p><?=WELCOME_TEXT?></p>
		</div>
	</article>
	<?php if($user->isStation($_SESSION['user_id'])) { ?>
		<article>
			<img src="assets/images/station_il.svg">
			<div class="arti">
				<h2><?=PLATFORM_MANAGER?></h2>
				<p><?=PLATFORM_MANAGER_TEXT?></p>
				<a href="index.php?page=platform_manager">
					<div class="btn">
						<p><?=WELCOME_GO?></p>
						<img src="assets/images/arrow.svg">
					</div>
				</a>
			</div>
		</article>
	<?php } if($user->isService($_SESSION['user_id'])) { ?>
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
<?php }
} else { ?>
	<article>
		<img src="assets/images/travel.svg">
		<div class="arti">
			<h2><?= WELCOME ?></h2>
			<p><?= WELCOME_TEXT ?></p>
		</div>
	</article>
	<article>
		<img src="assets/images/destination.svg">
		<div class="arti">
			<h2><?= TITLE_SEARCH ?></h2>
			<p><?= PLATFORM_MANAGER_TEXT ?></p>
			<a href="index.php?page=purchase">
				<div class="btn">
					<p><?= WELCOME_GO ?></p>
					<img src="assets/images/arrow.svg">
				</div>
			</a>
		</div>
	</article>
	<article>
		<img src="assets/images/search.svg">
		<div class="arti">
			<h2><?= STATION_LIST ?></h2>
			<p><?= MAINTENANCE_TEXT ?></p>
            <a href="index.php?page=station_list">
			<div class="btn">
				<p><?= WELCOME_GO ?></p>
				<img src="assets/images/arrow.svg">
			</div></a>
		</div>
	</article>

<?php } ?>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
