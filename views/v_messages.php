<?php require_once(PATH_VIEWS.'header.php');?>
<h1>Messages</h1>
<div id="chat">
    <div id="resume">
        <?php
        foreach ($discussions as $discussion) {?>
        <div>
            <h3><?= $discussion['DISCUSSION_ID'];?></h3>
            <p><?= substr($discussion['DISCUSSION_SUBJECT'],0,30).'...' ?></p>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<?php require_once(PATH_VIEWS.'footer.php'); 