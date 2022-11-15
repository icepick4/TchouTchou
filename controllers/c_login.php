<?php
require_once(PATH_LIB.'connexionBDD.php');

if (isset($_POST["mail"])&& isset($_POST["password"])) {

    $mail = $_POST["mail"];

    $request = 'SELECT * FROM USER_DATA where USER_MAIL = :mail';
    $stid = oci_parse($conn, $request);
    oci_bind_by_name($stid, ':mail', $mail);
    oci_execute($stid);
    $row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
    // print_r($row);

    if (!empty($row)) {
        if (password_verify($_POST["password"],$row['USER_PASSWORD'])) {
            //$TODO : faire un notif quand connexion réussie
            $_SESSION ['logged'] = true;
            $_SESSION['user_id'] = $row['USER_ID'];
        }else{
            $alert= choixAlert('unknown_password');
        }
    }else{
        $alert= choixAlert('unknown_mail');
    }
}


require_once(PATH_VIEWS.$page.'.php'); 
