<!-- Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'account.js?flag=' . DELETE_ACCOUNT . '---' . verif ?> type="module" defer></script>

<!--  Début de la page -->
<?php

if ($_SESSION['logged']) {
?>
    <h1 id="title"><?= WELCOME ?>
        <?= $result['USER_FIRSTNAME'] ?>
    </h1>
    <div class="content">
        <div class="links">
            <a class="link-profile" href="index.php?page=ticket_list">
                <div>
                    <?= SVG_TICKET ?>
                    <p><?= MY_TICKETS ?></p>
                </div>
            </a>
            <a class="link-profile" href="index.php?page=messages">
                <div>
                    <?= SVG_MESSAGE ?>
                    <p><?= MY_MESSAGES ?></p>
                </div>
            </a>
            <a class="link-profile">
                <div>
                    <?= SVG_DISCONNECT ?>
                    <p><?= LOGOUT ?></p>
                </div>
            </a>
            <a class="link-profile" id="delete-account">
                <div>
                    <?= SVG_DELETE ?>
                    <p><?= DELETE_ACCOUNT ?></p>
                </div>
            </a>
        </div>
        <div class="infos">
            <table id="table">
                <tr>
                    <td>
                        <?= FIRST_NAME ?>
                    </td>
                    <td>
                        <form method="post" action="index.php?page=account" id="form-first-name">
                            <label class="info">
                                <?= ERROR_FIRSTNAME ?>
                            </label>
                            <div class="input">
                                <input type="text" name="first-name" id="first-name" value="<?php echo $result['USER_FIRSTNAME'] ?>">
                                <input type="submit" value="OK">
                            </div>
                        </form>
                    </td>
                    <td>
                        <button>
                            <?= SVG_EDIT_PARAM_FIRST_NAME . SVG_EDIT ?>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><?= NAME ?></td>
                    <td>
                        <form method="post" action="index.php?page=account" id="form-last-name">
                            <label class="info">
                                <?= ERROR_NAME ?>
                            </label>
                            <div class="input">
                                <input type="text" name="last-name" id="last-name" value="<?php echo $result['USER_LASTNAME'] ?>">
                                <input type="submit" value="OK">
                            </div>
                        </form>
                    </td>
                    <td><button>
                            <?= SVG_EDIT_PARAM_LAST_NAME . SVG_EDIT ?>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><?= PHONE ?></td>
                    <td>
                        <form method="post" action="index.php?page=account" id="form-phone">
                            <label class="info">
                                <?= ERROR_PHONE ?>
                            </label>
                            <div class="input">
                                <input type="text" name="phone" id="phone" value="<?= $result['USER_PHONE'] ?>">
                                <input type="submit" value="OK">
                            </div>
                        </form>
                    </td>
                    <td><button>
                            <?= SVG_EDIT_PARAM_PHONE . SVG_EDIT ?>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><?= EMAIL ?></td>
                    <td>
                        <form method="post" action="index.php?page=account" id="form-mail">
                            <label class="info">
                                <?= ERROR_MAIL ?>
                            </label>
                            <div class="input">
                                <input type="text" name="mail" id="mail" value="<?= $result['USER_MAIL'] ?>">
                                <input type="submit" value="OK">
                            </div>
                        </form>
                    </td>
                    <td><button>
                            <?= SVG_EDIT_PARAM_MAIL . SVG_EDIT ?>
                        </button>
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <div id="lang">
        <p id="CONFIRM"><?= CONFIRM ?></p>
        <p id="CANCEL"><?= CANCEL ?></p>
    </div>
<?php

}

?>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
