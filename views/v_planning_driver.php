<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>


<!--  Début de la page -->
<h1>Planning</h1>

<table>
    <tr>
        <th><?= MONDAY ?></th>
        <th><?= TUESDAY ?></th>
        <th><?= WEDNESDAY ?></th>
        <th><?= THURSDAY ?></th>
        <th><?= FRIDAY ?></th>
        <th><?= SATURDAY ?></th>
        <th><?= SUNDAY ?></th>
    </tr>
    <?php for ($i=0; $i<24; $i++) { ?>
        <tr>
            <?php for ($j=0; $j<7; $j++) { ?>
                <td>
                    
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>


<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');