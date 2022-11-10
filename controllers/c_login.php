<?php
require_once(PATH_MODELS.'user.php');

if (isset($_POST["mail"])&& isset($_POST["password"])) {

    $mail = $_POST["mail"];

    $user = new UserDAO(true);
    $result = $user->getUserMail($mail);
    if (!empty($result)) {
        if (password_verify($_POST["password"],$result['USER_PASSWORD'])) {
            //$alert= choixAlert('connexion'); faire la gestion d'erreur
            $_SESSION ['logged'] = true;
            $_SESSION['user_id'] = $result['USER_ID'];
        }else{
            $alert= choixAlert('unknown_password');
        }
    }else{
        $alert= choixAlert('unknown_mail');
    }
}


require_once(PATH_VIEWS.$page.'.php'); 
