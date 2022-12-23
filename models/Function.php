<?php
function strTo24Time($time)
{
    $time = date("H:i",strtotime(str_replace(".",":",substr($time,10,5)).substr($time,strlen($time) -2,2)));
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
?>