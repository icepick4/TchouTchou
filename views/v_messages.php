<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'messages.js?flag=' . $_SESSION['user_id'] ?> type = "module" defer ></script>

<!--  Début de la page -->


<h1>Messages</h1>
<?php if (empty($discussions)) { ?>
<div class="nomessage">
    <p class='noMessage'>
        <?= NO_MESSAGES ?>
    </p>
    <a href="index.php?page=contact">
        <div class="btn">
            <p>
                <?= NO_MESSAGE_BTN ?>
            </p>
            <img src="assets/images/arrow.svg">
        </div>
    </a>
</div>
<?php } else { ?>
<div id="chat">
    <div id="resume">
        <?php

    foreach ($discussions as $discussion) { ?>
        <div class="discussion_resume">
            <h3>
                <?= $discussion['DISCUSSION_ID']; ?>
            </h3>
            <p>
                <?= substr($discussion['DISCUSSION_SUBJECT'], 0, 30) . '...' ?>
            </p>
        </div>
        <?php
    }
        ?>
    </div>
    <div id="messages">
        <p class="noMessage">
            <? echo CHOOSE_MESSAGE ?>
        </p>
    </div>
    <p  id="discussionAllowed" style="display:none">
        <?php foreach ($discussions as $discussion) {
        echo $discussion["DISCUSSION_ID"] . " ";
    } ?>
    </p>
</div>

<!--  Fin de la page -->

<!--  Pied de page -->
<?php }require_once(PATH_VIEWS . 'footer.php');