<!--  Entête de la page -->
<?php require_once(PATH_VIEWS . 'header.php'); ?>

<script src=<?= PATH_JS . 'messages.js?flag=' . $_SESSION['user_id'] ?> type = "module" defer ></script>

<!--  Début de la page -->


<h1>Messages</h1>
<?php if (empty($discussions) && !$isEmployee) { ?>
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
<?php } else if (!$isEmployee){  ?>
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
<?php } else if(!$isSupport){ ?>
<div id="chat">
    <div id="resume">
    <div class="container">
        <input type="text" id="search" autocomplete="off" placeholder="<?= SEARCH ?>">

        <i id="clear-search">X</i>
    </div>
        <?php

    foreach ($employees as $employee) {
        if($employee["USER_ID"]!=$_SESSION["user_id"]){ ?>
        <div class="discussion_resume">
        <p style="display:none"><?php  
        $discussion_id = $mailbox->getDiscussionBetweenUsers($_SESSION["user_id"],$employee["USER_ID"]); 
        if($discussion_id == null){
            echo "-".$employee["USER_ID"];
        }else{
            echo $discussion_id["DISCUSSION_ID"];
        } ?></p>
            <h3>
                <?= $employee['USER_FIRSTNAME'] ?>
            </h3>
            
        </div>
        <?php
    }} 
    echo '<p id="users" style="display:none">';
    foreach($employees as $employee){	
        echo $employee["USER_FIRSTNAME"]."//";
    }
    echo '</p>';
        ?>
    </div>
    <div id="messages">
        <p class="noMessage">
            <? echo CHOOSE_MESSAGE ?>
        </p>
    </div>
</div>

<?php }else{?>
    <div id="chat">
        <div id="resume">
            <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
            <button id="storage">Archive</button>
        </div>
        <div id="messages">
        
        </div>
    
<?php } ?>



<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS . 'footer.php');