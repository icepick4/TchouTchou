<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'messages.js?flag=' . $_SESSION['user_id'] ?> type="module" defer></script>

<!--  Début de la page -->


<h1>Messages</h1>
<div id="chat">
    <div id="resume">
        <?php
        foreach ($discussions as $discussion) { ?>
            <div class="discussion_resume">
                <h3><?= $discussion['DISCUSSION_ID']; ?></h3>
                <p><?= substr($discussion['DISCUSSION_SUBJECT'], 0, 30) . '...' ?></p>
            </div>
        <?php
        }
        ?>
    </div>
    <div id="messages">
    </div>
</div>

<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');
