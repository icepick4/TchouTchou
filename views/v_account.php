<?php
//  En tête de page
?>
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS . 'alert.php'); ?>

<!--  Début de la page -->
<script src=<?= PATH_JS . 'account.js?flag=' . DELETE_ACCOUNT ?> type="module" defer></script>



<?php

if ($_SESSION['logged']) {
?>
    <h1 id="title"><?= WELCOME ?><?php echo $result['USER_FIRSTNAME'] ?></h1>
    <div class="content">
        <div class="links">
            <a class="link-profile" href="index.php?page=ticket_list"><?= MY_TICKETS ?></a>
            <a class="link-profile" href="index.php?page=messages"><?= MY_MESSAGES ?></a>
            <a class="link-profile" href="index.php?page=shopping"><?= BUY_TICKET ?></a>
            <a class="link-profile" href="index.php?page=logout"><?= LOGOUT ?> </a>
            <button id="delete-account">
                <a class="link-profile"><?= DELETE_ACCOUNT ?></a>
            </button>
        </div>
        <div class="infos">
            <table id="table">
                <tr>
                    <td><?= FIRST_NAME ?></td>
                    <td><?php echo $result['USER_FIRSTNAME'] ?>
                        <form method="post" action="index.php?page=account" id="form-first-name">
                            <label class="info"><?= ERROR_FIRSTNAME ?></label>
                            <input type="text" name="first-name" id="first-name" value="<?php echo $result['USER_FIRSTNAME'] ?>">
                            <input type="submit" value="OK">
                        </form>
                    </td>
                    <td><button>
                            <img src="assets/images/edit.png" alt="edit" id="edit-first-name">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><?= NAME ?></td>
                    <td><?php echo $result['USER_LASTNAME'] ?>
                        <form method="post" action="index.php?page=account" id="form-last-name">
                            <label class="info"><?= ERROR_NAME ?></label>
                            <input type="text" name="last-name" id="last-name" value="<?php echo $result['USER_LASTNAME'] ?>">
                            <input type="submit" value="OK">
                        </form>
                    </td>
                    <td><button>
                            <img src="assets/images/edit.png" alt="edit" id="edit-last-name">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><?= PHONE ?></td>
                    <td><?php echo $result['USER_PHONE'] ?>
                        <form method="post" action="index.php?page=account" id="form-phone">
                            <label class="info"><?= ERROR_PHONE ?></label>
                            <input type="text" name="phone" id="phone" value="<?php echo $result['USER_PHONE'] ?>">
                            <input type="submit" value="OK">
                        </form>
                    </td>
                    <td><button>
                            <img src="assets/images/edit.png" alt="edit" id="edit-phone">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><?= EMAIL ?></td>
                    <td><?php echo $result['USER_MAIL'] ?>
                        <form method="post" action="index.php?page=account" id="form-mail">
                            <label class="info"><?= ERROR_MAIL ?></label>
                            <input type="text" name="mail" id="mail" value="<?php echo $result['USER_MAIL'] ?>">
                            <input type="submit" value="OK">
                        </form>
                    </td>
                    <td><button>
                            <img src="assets/images/edit.png" alt="edit" id="edit-mail">
                        </button>
                    </td>
                </tr>
            </table>

        </div>
    </div>
<?php

}

?>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
