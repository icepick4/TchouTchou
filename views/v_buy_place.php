<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS ?>buy_place.js type="module" defer></script>

<!--  Début de la page -->
<?php if ($trainType != "TER") { ?>
    <article id="seatChoiceSection">
        <p id="typeTrain" style="display:none"><?= $trainType ?></p>
        <h1><?= SELECT_SEATS ?></h1>

        <?php if ($trainType == "TGVDuplex") { ?>
            <label class="switch">
                <input type="checkbox">
                <span class="slider round">
                    <p id="groundFloor"><?= GROUND_LEVEL ?></p>
                    <p id="elevatedFloor"><?= FIRST_LEVEL ?></p>
                </span>
            </label>
        <?php } ?>

        <div id="content"></div>

        <div id="buttonContainer">
            <button id="previous"><?= PREVIOUS ?></button>
            <button id="next"><?= NEXT ?></button>
        </div>
        <p id="continueText"><?= SEAT_NEEDED ?></p>
    </article>
<?php } ?>
<article id="seatInfoSection">

    <form action="index.php?page=buy_payment" method="post">
        <input type="hidden" name="travel" value="<?= $travel_id ?>">
        <input type="hidden" name="line" value="<?= $line ?>">
        <input type="hidden" name="from" value="<?= $from ?>">
        <input type="hidden" name="to" value="<?= $to ?>">
        <input type="hidden" name="price" value="<?= $price ?>">
        <input type="hidden" name="nbr" id="nbr" value="<?= $nbr ?>">
        <input type="hidden" name="seat" id="seat">

        <p id="nbrSeats" style="display:none"><?= $nbr ?> </p>
        <div id="seats">
            <?php
            for ($i = 0; $i < $_POST['nbr']; $i++) { ?>
                <fieldset>
                    <?php if ($trainType == "TER") { ?>
                        <label><?= NO_SEAT_NUMBER . strval($i + 1) ?></label>
                    <?php } else { ?>
                        <label><?= SEAT_NUMBER ?><span id=<?= 'seat_' . ($i + 1) ?>></span></label>
                    <?php } ?>
                    <div id="name">
                        <div id="first-name">
                            <label for=" firstname_<?= $i + 1 ?>"><?= FIRST_NAME ?> </label>
                            <input type="text" name="firstname_<?= $i + 1 ?>" id="firstname_<?= $i + 1 ?>" required>
                        </div>
                        <div id="last-name">
                            <label for="name_<?= $i + 1 ?>"><?= NAME ?></label>
                            <input type="text" name="name_<?= $i + 1 ?>" id="name_<?= $i + 1 ?>" required>
                        </div>
                    </div>
                </fieldset>
            <?php }
            ?>
        </div>
        <p id="error-names" class="error"><?= ERROR_NAMES ?></p>
        <p id="error-names-empty" class="error"><?= ERROR_NAMES_EMPTY ?></p>

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
