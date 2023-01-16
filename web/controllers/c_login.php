<?php
require_once(PATH_MODELS . 'UserDAO.php');

if (isset($_POST["mail"]) && isset($_POST["password"])) {
    $mail = $_POST["mail"];
    $user = new UserDAO();
    $result = $user->getUserByMail($mail);
    if (!empty($result)) {
        if (password_verify($_POST["password"], $result['USER_PASSWORD'])) {
            //$TODO : faire un notif quand connexion réussie
            $_SESSION['logged'] = true;
            $_SESSION['user_id'] = $result['USER_ID'];
            $_SESSION['first_name'] = $result['USER_FIRSTNAME'];
            $_SESSION['last_name'] = $result['USER_LASTNAME'];
            header("Location: index.php?page=home");
            die();
        } else {
            $alert = choixAlert('unknown_password');
        }
    } else {
        $alert = choixAlert('unknown_mail');
    }
}


require_once(PATH_VIEWS . $page . '.php');
