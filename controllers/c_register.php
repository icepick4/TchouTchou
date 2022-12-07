<?php
require_once(PATH_MODELS . 'UserDAO.php');
if (
    isset($_POST["name"]) &&
    isset($_POST["fname"]) &&
    isset($_POST["phone"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"]) &&
    isset($_POST["confirmPassword"])
) {
    $user = new UserDAO();
    $name = $_POST["name"];
    $fname = $_POST["fname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $mails = $user->getAllUserMail();
    $mail = array('USER_MAIL' => $email);

    if (in_array($mail, $mails)) {
        $alert = choixAlert('Mail_already_used');
    } else {
        if ($_POST["password"] == $_POST["confirmPassword"]) {

            $password = $user->hashPassword($_POST["password"]);

            $user->insertUser($email, $phone, $password, $name, $fname, 0);
            header('Location: index.php?page=login');
            exit();
        } else {
            $alert = choixAlert('password_not_match');
        }
    }
}
require_once(PATH_VIEWS . $page . '.php');
