<?php require_once(PATH_VIEWS . 'header.php'); ?>

<form>
<?php 
echo $_POST['nbr'];
print_r($_POST);
    if (isset($_POST['seat']))
    {
        $seats = explode('//', $_POST['seat']);
        for($i=0 ; $i < $_POST['nbr'] ; $i++ )
        { ?>
            <fieldset>
		        <legend>Place n°<?=$seats[$i]?></legend>
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" required>
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname" required>
            </fieldset>
        <?php }
    } else {
        for($i=0 ; $i < $_POST['nbr'] ; $i++ )
        {?>
            <fieldset>
		        <legend>Ticket n°<?= $i+1?></legend>
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" required>
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname" required>
            </fieldset>
        <?php }
    }
?>
    <input type="submit" value="Valider">
</form>
<?php require_once(PATH_VIEWS . 'footer.php');