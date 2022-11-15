<?php
require_once(PATH_LIB . 'connexionBDD.php');


if (!$_SESSION['logged']) {
    header("Location: index.php?page=login");
    die();
} else {
    $request = 'SELECT * FROM TICKET where USER_ID = :id';
    $stid = oci_parse($conn, $request);
    oci_bind_by_name($stid, ':id', $_SESSION['user_id']);
    oci_execute($stid);
}

require_once(PATH_VIEWS . $page . '.php');
