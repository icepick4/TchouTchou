<!DOCTYPE html>
<html>

<body>
    
    <?php
    chdir("../");
    //pour utiliser le fichier de config de base
    $skipSession = true;
    require_once('./config/configuration.php');
    require_once(PATH_MODELS . 'UserDAO.php');

    $nbr = intval($_GET['nbr']);
    $travel_id = $_GET['travel'];
    $from_id = $_GET['from'];
    $to_id = $_GET['to'];
    $user_id = $_GET['user_id'];
    $seat = $_GET['seat'];
    $name = $_GET['name'];
    $firstname = $_GET['firstname'];

    $seat = explode("//", $seat);
    $name = explode("//", $name);
    $firstname = explode("//", $firstname);


    $user = new UserDAO();

    for ($i=0; $i < $nbr; $i++) { 
        if($seat[0] == null){
            $user->addTicket($user_id, $travel_id, $from_id, $to_id, null, $firstname[$i], $name[$i]);
        }else{
            $user->addTicket($user_id, $travel_id, $from_id, $to_id, $seat[$i], $firstname[$i], $name[$i]);
        }
    }



