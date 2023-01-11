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

function choixImage($id)
{
    switch ($id) {
        case '1':
            $result = 'alert_bomb.svg';
            break;
        case '2':
            $result = 'alert_gun.svg';
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

function getDay($input)
{
    $day = date('l', strtotime($input));
    switch ($day) {
        case 'Monday':
            $result = MONDAY;
            break;
        case 'Tuesday':
            $result = TUESDAY;
            break;
        case 'Wednesday':
            $result = WEDNESDAY;
            break;
        case 'Thursday':
            $result = THURSDAY;
            break;
        case 'Friday':
            $result = FRIDAY;
            break;
        case 'Saturday':
            $result = SATURDAY;
            break;
        case 'Sunday':
            $result = SUNDAY;
            break;
        default:
            $result = 'error';
            break;
    }
    return $result;
}

function getMonth($input)
{
    $month = date('F', strtotime($input));
    switch ($month) {
        case 'January':
            $result = JANUARY;
            break;
        case 'February':
            $result = FEBRUARY;
            break;
        case 'March':
            $result = MARCH;
            break;
        case 'April':
            $result = APRIL;
            break;
        case 'May':
            $result = MAY;
            break;
        case 'June':
            $result = JUNE;
            break;
        case 'July':
            $result = JULY;
            break;
        case 'August':
            $result = AUGUST;
            break;
        case 'September':
            $result = SEPTEMBER;
            break;
        case 'October':
            $result = OCTOBER;
            break;
        case 'November':
            $result = NOVEMBER;
            break;
        case 'December':
            $result = DECEMBER;
            break;
        default:
            $result = 'error';
            break;
    }
    return $result;
}

function hashPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

function strTo24Time($time)
{
    $time = date("H:i", strtotime(str_replace(".", ":", substr($time, 10, 5)) . substr($time, strlen($time) - 2, 2)));
    return $time;
}

function minToHourMin($min)
{
    $hour = floor($min / 60);
    $min = $min % 60;
    if ($min < 10) {
        $min = "0" . $min;
    }
    return $hour . "h" . $min;
}
