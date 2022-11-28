
<!DOCTYPE html>
<html>

<body>

<?php

//pour utiliser le fichier de config de base
// $skipSession = true;
// require_once('../config/configuration.php');
// require_once('.'.PATH_MODELS . 'UserDAO.php');



$id = intval($_GET['number']);

$request = 'SELECT * FROM DISCUSSION_SUPPORT WHERE DISCUSSION_ID=:id ORDER BY DISCUSSION_ID DESC';
$args = array(':id' => $id);

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


print_r($result);


?>
</body>
</html> 