<!--  Entête de page -->
<?php
require_once(PATH_VIEWS . 'header.php');
require_once(PATH_MODELS . 'UserDAO.php');
require_once(PATH_MODELS . 'StaffDAO.php');

$user = new UserDAO();
$staff = new StaffDAO();
?>


<!-- Début de la page -->

<?php if (!isset($_SESSION['user_id']) || !$staff->isEmployee($_SESSION['user_id'])) { ?>
<article>
	<img src="assets/images/travel.svg" alt=<?= ALT_WOMEN_WITH_LUGGAGE ?>>
	<div class="arti">
		<h2>
			<?= WELCOME_PT1 . '<span>Tchoutchou</span>' . WELCOME_PT2; ?>
		</h2>
		<p>
			<?= WELCOME_TEXT ?>
		</p>
		<p>
			<?= WELCOME_TEXT2 ?>
		</p>
	</div>
</article>
<article>
	<img src="assets/images/destination.svg" alt=<?= ALT_PHONE_SEARCH ?>>
	<div class="arti">
		<h2>
			<?= TITLE_SEARCH ?>
		</h2>
		<p>
			<?= SEARCH_TEXT ?>
		</p>
		<a href="index.php?page=buy">
			<div class="btn">
				<p>
					<?= WELCOME_GO ?>
				</p>
				<img src="assets/images/arrow.svg" alt=<?= ALT_ARROW_RIGHT?>>
			</div>
		</a>
	</div>
</article>
<article>
	<img src="assets/images/search.svg" alt=<?= ALT_WOMEN_SEARCH?>>
	<div class="arti">
		<h2>
			<?= TITLE_STATION_LIST ?>
		</h2>
		<p>
			<?= STATION_TEXT ?>
		</p>
		<a href="index.php?page=station_list">
			<div class="btn">
				<p>
					<?= WELCOME_GO ?>
				</p>
				<img src="assets/images/arrow.svg" alt=<?= ALT_ARROW_RIGHT?>>
			</div>
		</a>
	</div>
</article>
<?php } else { ?>
<article>
	<img src="assets/images/work_il.svg" alt=<?= ALT_ARROW_RIGHT?>>
	<div class="arti">
		<h2>
			<?= WELCOME ?>
		</h2>
		<p>
			<?= WELCOME_TEXT_EMP ?>
		</p>
	</div>
</article>
<?php if ($staff->isStation($_SESSION['user_id'])) { ?>
<article>
	<img src="assets/images/station_il.svg">
	<div class="arti">
		<h2>
			<?= PLATFORM_MANAGER ?>
		</h2>
		<p>
			<?= PLATFORM_MANAGER_TEXT ?>
		</p>
		<a href="index.php?page=platform_manager">
			<div class="btn">
				<p>
					<?= WELCOME_GO ?>
				</p>
				<img src="assets/images/arrow.svg" alt=<?= ALT_ARROW_RIGHT?>>
			</div>
		</a>
	</div>
</article>
<?php }
if ($staff->isDriver($_SESSION['user_id'])) { ?>
	<article>
		<img src="assets/images/calendar.svg">
		<div class="arti">
			<h2>
				<?= TITLE_PLANNING ?>
			</h2>
			<p>
				<?= PLANNING_TEXT ?>
			</p>
			<a href="index.php?page=planning_driver">
				<div class="btn">
					<p>
						<?= WELCOME_GO ?>
					</p>
					<img src="assets/images/arrow.svg" alt=<?= ALT_ARROW_RIGHT?>>
				</div>
			</a>
		</div>
	</article>
	<?php }
	if ($staff->isService($_SESSION['user_id'])) { ?>
<article>
	<img src="assets/images/engineer_il.svg">
	<div class="arti">
		<h2>
			<?= MAINTENANCE ?>
		</h2>
		<p>
			<?= MAINTENANCE_TEXT ?>
		</p>
		<a href="index.php?page=maintenance">
			<div class="btn">
				<p>
					<?= WELCOME_GO ?>
				</p>
				<img src="assets/images/arrow.svg" alt=<?= ALT_ARROW_RIGHT?>>
			</div>
		</a>
	</div>
</article>
<article>
	<img src="assets/images/attention.svg">
	<div class="arti">
		<h2>
			<?= ALERT_LIST ?>
		</h2>
		<p>
			<?= ALERT_LIST_TEXT ?>
		</p>
		<a href="index.php?page=alert_list">
			<div class="btn">
				<p>
					<?= WELCOME_GO ?>
				</p>
				<img src="assets/images/arrow.svg" alt=<?= ALT_ARROW_RIGHT?>>
			</div>
		</a>
	</div>
</article>
<?php }}
	if ((isset($_SESSION['user_id']) || $staff->isEmployee($_SESSION['user_id']))){?>
<article>
	<img src="assets/images/message.svg">
	<div class="arti">
		<h2>
			<?= MESSAGE ?>
		</h2>
		<p>
			<?= MESSAGE_TEXT ?>
		</p>
		<a href="index.php?page=messages">
			<div class="btn">
				<p>
					<?= WELCOME_GO ?>
				</p>
				<img src="assets/images/arrow.svg">
			</div>
		</a>
	</div>
</article>
<?php }
?>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');