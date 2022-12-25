<!-- Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'account.js?flag=' . DELETE_ACCOUNT . '---' . verif ?> type="module" defer></script>

<!--  Début de la page -->
<?php

if ($_SESSION['logged']) {
?>
    <h1 id="title"><?= WELCOME ?><?php echo $result['USER_FIRSTNAME'] ?></h1>
    <div class="content">
        <div class="links">
            <a class="link-profile" href="index.php?page=ticket_list"><div><img src="assets/images/tickets.svg" ><p><?= MY_TICKETS ?></p></div></a>
            <a class="link-profile" href="index.php?page=messages"><div><img src="assets/images/message_ico.svg" ><p><?= MY_MESSAGES ?></p></div></a>
            <a class="link-profile" href="index.php?page=logout"><div><img src="assets/images/disconnect.svg" ><p><?= LOGOUT ?></p></div></a>
            <button id="delete-account">
                <a class="link-profile"><div><img src="assets/images/settings.svg" ><p><?= DELETE_ACCOUNT ?></p></div></a>
            </button>
        </div>
        <div class="infos">
            <table id="table">
                <tr>
                    <td><?= FIRST_NAME ?></td>
                    <td>
                        <form method="post" action="index.php?page=account" id="form-first-name">
                            <label class="info"><?= ERROR_FIRSTNAME ?></label>
                            <div class="input">
                                <input type="text" name="first-name" id="first-name" value="<?php echo $result['USER_FIRSTNAME'] ?>">
                                <input type="submit" value="OK">
                            </div>
                        </form>
                    </td>
                    <td>
                        <button>
                            <img src="assets/images/edit.png" alt="edit" id="edit-first-name">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><?= NAME ?></td>
                    <td>
                        <form method="post" action="index.php?page=account" id="form-last-name">
                            <label class="info"><?= ERROR_NAME ?></label>
                            <div class="input">
                                <input type="text" name="last-name" id="last-name" value="<?php echo $result['USER_LASTNAME'] ?>">
                                <input type="submit" value="OK">
                            </div>
                        </form>
                    </td>
                    <td><button>
                            <img src="assets/images/edit.png" alt="edit" id="edit-last-name">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><?= PHONE ?></td>
                    <td>
                        <form method="post" action="index.php?page=account" id="form-phone">
                            <label class="info"><?= ERROR_PHONE ?></label>
                            <div class="input">
                                <input type="text" name="phone" id="phone" value="<?php echo $result['USER_PHONE'] ?>">
                                <input type="submit" value="OK">
                            </div>
                        </form>
                    </td>
                    <td><button>
                            <img src="assets/images/edit.png" alt="edit" id="edit-phone">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><?= EMAIL ?></td>
                    <td>
                        <form method="post" action="index.php?page=account" id="form-mail">
                            <label class="info"><?= ERROR_MAIL ?></label>
                            <div class="input">
                                <input type="text" name="mail" id="mail" value="<?php echo $result['USER_MAIL'] ?>">
                                <input type="submit" value="OK">
                            </div>
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
