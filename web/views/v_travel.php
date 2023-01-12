<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>


<script src=<?= PATH_JS . 'travel.js' ?> type="module" defer></script>




<p id="stationsArray" style="display:none"><?php foreach ($stations as $station) { echo $station['STATION_NAME'] . '//';}?></p>


<form method="post" action="index.php?page=travel">

    <div class="container">
        <input type="text" id="search1" autocomplete="off" placeholder="<?= START_STATION ?>" name="from" class="search" <?php if (isset($_GET['from'])) {echo 'value="' . $_GET['from'] . '"';} ?>>
        <i class="clear-search">X</i>
    </div>
    <a id="boxArrow"><img src="<?= PATH_IMAGES . "exchangeArrow.svg" ?>" id="exchangArrow"></a>
    <div class="container">
        <input type="text" id="search2" autocomplete="off" placeholder="<?= END_STATION ?>" name="to" class="search" <?php if (isset($_GET['to'])) {echo 'value="' . $_GET['to'] . '"';} ?>>
        <i class="clear-search">X</i>
    </div>

        <label></label>
        <input type="email" name="mail" id="email" placeholder="<?= EMAIL ?>"></input>
        <input type="submit" value="Login"></input>
    </form>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
