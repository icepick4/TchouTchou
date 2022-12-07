<!DOCTYPE html>
<html>

<body>

    <?php

    chdir("../");
    //pour utiliser le fichier de config de base
    $skipSession = true;
    require_once('./config/configuration.php');
    require_once(PATH_MODELS . 'UserDAO.php');
    require_once(PATH_MODELS . 'MessageDAO.php');

    $user = new UserDAO();
    $mailbox = new MessageDAO();

    $id_discussion = intval($_GET['number']);
    $user_id = intval($_GET['id']);
    $discussionData = $mailbox->getDiscussionSubjectById($id_discussion);

    ?><h2><?php print_r($discussionData['DISCUSSION_SUBJECT']); ?></h2><?php


                                                                    $result = $mailbox->getDiscussionById($id_discussion);

                                                                    foreach ($result as $message) {
                                                                        if ($message['SENDER_ID'] == $user_id) {
                                                                    ?><p class="sender"><?php
                                                                        } else {
                                ?>
            <p class="receiver"><?php
                                                                        }
                                                                        print_r($message['MESSAGE_CONTENT']) ?></p><?php
                                                                    }
                                                        ?>
        <form method="post" action="index.php?page=messages">
            <input type="hidden" id="discussion_id" name="discussion_id" value=<?= $id_discussion ?>>
            <input type="text" id="message" name="message" placeholder="Votre message">
            <input type="submit" id="submit" value="Envoyer">
        </form>