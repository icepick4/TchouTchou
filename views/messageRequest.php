
<!DOCTYPE html>
<html>

<body>

<?php

//pour utiliser le fichier de config de base
// $skipSession = true;
// require_once('../config/configuration.php');
// require_once('.'.PATH_MODELS . 'UserDAO.php');

function requestSQL($request,$args)
{
    $connect = '(DESCRIPTION=(ADDRESS= (PROTOCOL=TCP)(HOST=tchoutchou.ovh)(PORT=5521 ))(CONNECT_DATA = (SID =xe)))';
        $test = oci_pconnect('Tchou', 'Tchoutchou69', $connect);

        $stid = oci_parse($test, $request);
        if ($args == null) {
        } else {
            foreach ($args as $key => $val) {
                oci_bind_by_name($stid, $key, $args[$key]);
            }
        }
        oci_execute($stid);
        $i = 0;
        $result = array();

        while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
            $result[$i] = $row;
            $i++;
        }
    return $result;
}
$id = intval($_GET['number']);

$result = requestSQL('SELECT * FROM DISCUSSION_SUPPORT WHERE DISCUSSION_ID=:id',array(':id' => $id));
?><h2><?php print_r($result[0]['DISCUSSION_SUBJECT']); ?></h2><?php

$request = 'SELECT * FROM MESSAGE_SUPPORT WHERE DISCUSSION_ID=:id ORDER BY MESSAGE_TIME ASC';
$args = array(':id' => $id);

$result = requestSQL($request,$args);

        ?>

        <?php
        foreach ($result as $message)
        {
            if ($message['SENDER'] == 1)
            {
            ?><p class="receiver"><?php
            }else{
            ?><p class="sender"><?php
            } print_r($message['MESSAGE_CONTENT'])
            ?>
            </p>
            <?php
        }
?>
<form method="post" action="index.php?page=messages">
        <input type="hidden" id="discussion_id" name="discussion_id" value="">
        <input type="text" id="message" name="message" placeholder="Votre message">
        <input type="submit" id="submit" value="Envoyer">
    </form> 