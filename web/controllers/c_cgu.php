<?php

if (LANG == 'fr') {
    require_once("./views/cgu/v_" . LANG . '_' . $page . '.php');
} else {
    require_once("./views/cgu/v_en_" . $page . '.php');
}

?>