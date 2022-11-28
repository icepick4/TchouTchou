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
    $password = $user->hashPassword($_POST["password"]);

    $user->insertUser($email, $phone, $password, $name, $fname, 0);
    header('Location: index.php?page=login');
    exit();
}
require_once(PATH_VIEWS . $page . '.php');
