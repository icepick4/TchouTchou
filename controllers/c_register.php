<?php
require_once(PATH_MODELS . 'UserDAO.php');

if ( 
    isset($_POST["name"]) && 
    isset($_POST["fname"]) && 
    isset($_POST["tel"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"]) &&
    isset($_POST["confirmpassword"])
    ) {
        $name = $_POST["name"];
        $fname = $_POST["fname"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
    }
require_once(PATH_VIEWS . $page . '.php');