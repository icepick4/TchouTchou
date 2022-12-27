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
        case 'Mail_already_used':
            $alert['messageAlert'] = MAIL_ALREADY_USED;
            $alert["typeAlert"] = "form";
            break;
        case 'password_not_match':
            $alert['messageAlert'] = ERROR_PASSWORD_DIFFERENT;
            $alert["typeAlert"] = "form";
            break;
        case 'alert_created':
            $alert['messageAlert'] = ALERT_CREATED;
            $alert["typeAlert"] = "form";
            $alert["classAlert"] = "success";
            break;
        default:
            $alert['messageAlert'] = MESSAGE_ERREUR;
    }
    return $alert;
}
