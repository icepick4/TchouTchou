<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS ?>buy_place.js type="module" defer></script>

<!--  Début de la page -->
<?php if($trainType != "TER"){ ?>
<article id="seatChoiceSection">
    <p id="typeTrain" style="display:none"><?= $trainType ?></p>
    <h1><?= SELECT_SEATS ?></h1>

    <div id="content"></div>

    <div id="buttonContainer">
        <button id="previous"><?= PREVIOUS ?></button>
        <button id="next"><?= NEXT ?></button>
    </div>
    <p id="continueText"><?= SEAT_NEEDED ?></p>
</article>
<?php } ?>
<article id="seatInfoSection">
    
    <form action="index.php?page=buy_details" method="post">
        <input type="hidden" name="travel" value="<?= $travel_id ?>">
        <input type="hidden" name="line" value="<?= $line ?>">
        <input type="hidden" name="from" value="<?= $from ?>">
        <input type="hidden" name="to" value="<?= $to ?>">
        <input type="hidden" name="price" value="<?= $price ?>">
        <input type="hidden" name="nbr" id="nbr" value="<?= $nbr ?>">
        <input type="hidden" name="seat" id="seat">

        <p id="nbrSeats" style="display:none"><?= $nbr?> </p>

    <?php 
        for($i=0 ; $i < $_POST['nbr'] ; $i++ )
        { ?>
            <fieldset>
                <?php if($trainType=="TER"){ ?>
                    <label><?= NO_SEAT_NUMBER . $i?></label>
                <?php }else{ ?>
                <label><?= SEAT_NUMBER ?><span id=<?='seat_'.($i+1)?> ></span></label>
                <?php } ?>
                <div>
                    <label for="name"><?= NAME ?></label>
                    <input type="text" name="name" id="name" required>
                    <label for="firstname"><?= FIRST_NAME ?> </label>
                    <input type="text" name="firstname" id="firstname" required>
                </div>
            </fieldset>
        <?php }
    ?>
        <input type="submit" value="<?= VALIDATE ?>" id="continueButton" class="disabled">
    </form>

</article>

<p id="seatArray" style="display:none"><?php 
    foreach ($places as $place) {
        echo $place["PLACE_ID"] . '//';
    }
?></p>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
