<?php
function strTo24Time($time)
{
    $time = date("H:i",strtotime(str_replace(".",":",substr($time,10,5)).substr($time,strlen($time) -2,2)));
    return $time;
}

?>