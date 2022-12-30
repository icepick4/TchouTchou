<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>
<section id="mapContainer">
    <img src="<?= PATH_IMAGES ?>carte2.svg" id="map">
    <a id="fullScreenButton"><img src="<?= PATH_IMAGES ?>expand.png"></a>
</section>
<section id="faq">
    <h2>FAQ</h2>
    <article>
        <h3><?= HOW_TO_BUY ?></h3>
        <p><?= HOW_TO_BUY_TEXT ?></p>
    </article>
    <article>
        <h3><?= HOW_TO_SEE_TICKET ?></h3>
        <p><?= HOW_TO_SEE_TICKET_TEXT ?></p>
    </article>
    <article>
        <h3><?= HOW_TO_CANCEL_TICKET ?></h3>
        <p><?= HOW_TO_CANCEL_TICKET_TEXT ?></p>
    </article>
    <article>
        <h3><?= HOW_TO_SEE_MESSAGES ?></h3>
        <p><?= HOW_TO_SEE_MESSAGES_TEXT ?></p>
    </article>
    <article>
        <h3><?= HOW_TO_SEND_MESSAGES ?></h3>
        <p><?= HOW_TO_SEND_MESSAGES_TEXT ?></p>
    </article>
</section>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');

?>
<script>
    let fullScreenButton = document.getElementById('fullScreenButton');
    let map = document.getElementById('map');
    fullScreenButton.addEventListener('click', function () {
        console.log('click');
        map.requestFullscreen();
    });
</script>