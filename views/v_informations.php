<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>
<section id="mapContainer">
    <img src="<?= PATH_IMAGES ?>carte2.svg" id="map">
    <a id="fullScreenButton"><img src="<?= PATH_IMAGES ?>expand.png"></a>
</section>
<section id="faq">
    <h2>FAQ</h2>
    <article>
        <p>Qu'est-ce que le site ?</p>
        <p>Le site est un site de partage de lieux de pêche. Il permet de partager des lieux de pêche avec les autres utilisateurs du site. Il permet aussi de trouver des lieux de pêche à proximité de chez soi.</p>
    </article>
    <article>
        <p>Qui sommes nous ?</p>
        <p>Nous sommes un groupe de 4 étudiants en BTS SIO option SLAM. Nous avons réalisé ce site dans le cadre de notre formation.</p>
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