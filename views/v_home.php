<!--  Entête de page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>


<!-- Début de la page -->

<?php
if (!$_SESSION['logged']) {
?>
	<article>
		<img src="assets/images/travel.svg">
		<div class="arti">
			<h2><?=WELCOME?></h2>
			<p><?=WELCOME_TEXT?></p>
		</div>
	</article>
	<article>
		<img src="assets/images/destination.svg">
		<div class="arti">
			<h2><?=TITLE_SEARCH?></h2>
			<p><?=PLATFORM_MANAGER_TEXT?></p>
			<a href="index.php?page=purchase">
				<div class="btn">
					<p><?=WELCOME_GO?></p>
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

<?php
    } else { ?>
    <div class="content">
        <h1 id="title"><?= WELCOME ?><?php echo $_SESSION['first_name'] ?> !</h1>
        <div class="links">
            <a href="index.php?page=account"><?= MY_ACCOUNT ?></a>
            <a href="index.php?page=ticket_list"><?= MY_TICKETS ?></a>
            <a href="index.php?page=messages"><?= MY_MESSAGES ?></a>
            <a href="index.php?page=shopping"><?= BUY_TICKET ?></a>
            <a href="index.php?page=logout"><?= LOGOUT ?></a>
        </div>
    </div>
<?php
}
?>

<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
