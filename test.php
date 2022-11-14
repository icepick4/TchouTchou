<?php

// Connects to the XE service (i.e. database) on the "localhost" machine
$connect='(DESCRIPTION=(ADDRESS= (PROTOCOL=TCP)(HOST=tchoutchou.ovh)(PORT=5521 ))(CONNECT_DATA = (SID =xe)))';

$conn = oci_connect('Tchou', 'Tchoutchou69', $connect);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT * FROM Travel');
oci_execute($stid);

while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    foreach ($row as $item) {
        echo $item;
        echo "<br>";
    }
}
?>