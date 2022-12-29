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

function choixImage($id){
    switch ($id) {
        case '1':
            $result = 'alert_bomb.svg';
            break;
        case '2':
            $result= 'alert_gun.svg';
            break;
        case '3':
            $result = 'alert_rescue.svg';
            break;
        case '4':
            $result = 'alert_medical.svg';
            break;
        case '5':
            $result = 'alert_rail_crossing.svg';
            break;
        case '6':
            $result = 'alert_railway.svg';
            break;
        case '7':
            $result = 'alert_sign.svg';
            break;
        case '8':
            $result = 'alert_electric.svg';
            break;
        case '9':
            $result = 'alert_maintenance.svg';
            break;
        case '10':
            $result = 'alert_temperature.svg';
            break;
        case '11':
            $result = 'alert_fire.svg';
            break;
        case '12':
            $result = 'alert_other.svg';
            break;
        default:
            $result = "error";
            break;
    }
    return $result;
}