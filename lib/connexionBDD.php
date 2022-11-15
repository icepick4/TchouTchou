<?php

// Connects to the XE service (i.e. database) on the "localhost" machine
$connect = '(DESCRIPTION=(ADDRESS= (PROTOCOL=TCP)(HOST=' . BD_HOST . ')(PORT=' . BD_PORT . ' ))(CONNECT_DATA = (SID =' . BD_SID . ')))';

$conn = oci_connect(BD_USER, BD_PWD, $connect);


if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    echo "failed";
}
