<!DOCTYPE html>
<html>
	<head>
		<title><?= TITRE ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="Language" content="<?= LANG ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="<?= PATH_CSS ?>common.css" rel="stylesheet">
		

	</head> 
	<body>
		<!-- En-tête -->
		<header class="" >
			<section class="" >
						<img src="<?= PATH_LOGO ?>" alt="<?= LOGO ?>" class="">
						<h2><?= TITRE ?></h2>
			</section>
		</header>
		<!-- Menu -->
		<?php include(PATH_VIEWS.'menu.php'); ?>
		<!-- Vue -->
			<section class="">
				
