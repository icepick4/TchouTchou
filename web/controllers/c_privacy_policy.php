<?php

if (LANG == 'fr') {
    require_once("./views/privacy_policy/v_" . LANG . '_' . $page . '.php');
} else {
    require_once("./views/privacy_policy/v_en_" . $page . '.php');
}

?>