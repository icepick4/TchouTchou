<!DOCTYPE html>
<html>

<body>
    
    <?php
    chdir("../");
    //pour utiliser le fichier de config de base
    $skipSession = true;
    require_once('./config/configuration.php');
    require_once(PATH_MODELS . 'MessageDAO.php');

    $nbr = intval($_GET['nbr']);
    $travel_id = $_GET['travel'];
    $from_id = $_GET['from'];
    $to_id = $_GET['to'];
    $user_id = $_GET['user_id'];
    $place = $_GET['place'];
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];

    $place = explode("//", $place);
    $nom = explode("//", $nom);
    $prenom = explode("//", $prenom);


    $user = new UserDAO();

    for ($i=0; $i < $nbr; $i++) { 
        $user->addTicket($user_id, $travel_id, $from_id, $to_id, $place[$i], $prenom[$i], $nom[$i]);
    }



