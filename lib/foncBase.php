<?php

function choixAlert($message)
{
    $alert = array();
    switch ($message) {
        case 'query':
            $alert['messageAlert'] = ERREUR_QUERY;
            break;
        case 'url_non_valide':
            $alert['messageAlert'] = TEXTE_PAGE_404;
            break;
        case 'unknown_mail':
            $alert['messageAlert'] = UNKWOWN_MAIL;
            $alert["typeAlert"] = "form";
            break;
        case 'unknown_password':
            $alert['messageAlert'] = UNKNOWN_PASSWORD;
            $alert["typeAlert"] = "form";
            break;
        default:
            $alert['messageAlert'] = MESSAGE_ERREUR;
    }
    return $alert;
}

function getTime($minutes)
{
    $hours = floor($minutes / 60);
    $minutes = $minutes % 60;
    return $hours . 'h' . $minutes;
}
