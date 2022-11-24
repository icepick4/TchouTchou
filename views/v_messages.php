<?php require_once(PATH_VIEWS.'header.php');?>
<script src=<?= PATH_JS . 'messages.js' ?> type="module" defer></script>
<h1>Messages</h1>
<div id="chat">
    <div id="resume">
        <?php
        foreach ($discussions as $discussion) {?>
        <div class="discussion_resume">
            <h3><?= $discussion['DISCUSSION_ID'];?></h3>
            <p><?= substr($discussion['DISCUSSION_SUBJECT'],0,30).'...' ?></p>
        </div>
        <?php
        }
        ?>
    </div>
    <div id="messages">
        <?php
        foreach ($discussions as $discussion) {?>
            <div class=<?= $discussion['DISCUSSION_ID'];?>>
            <h2><?= $discussion['USER_MAIL'] ?></h2>
            <?php
            foreach ($messages as $message) {
                if ($message['DISCUSSION_ID'] == $discussion['DISCUSSION_ID']) {
                    if ($message['SENDER'] == 1) {
                        ?>
                            <p class="receiver" ><?= $message['MESSAGE_CONTENT'] ?></p>
                        <?php
                    } else {
                        ?>
                            <p class="sender"><?= $message['MESSAGE_CONTENT'] ?></p>
                        <?php
                    }
                }
            }?>
            </div>
        <?php
    };?>
    </div>
</div>
<?php require_once(PATH_VIEWS.'footer.php'); 