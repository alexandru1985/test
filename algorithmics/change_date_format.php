<?php

function changeDateFormat(array $dates): array {

    $dateFormat = array();

    foreach ($dates as $date) {    
            $date =  preg_replace('/-/', '/', $date);
            $changeDateFormat[]= date("Ymd", strtotime($date));
    }
      
    return $changeDateFormat;
}

$dates = changeDateFormat(["2010/03/30", "15/12/2016", "11-15-2012", "20130720"]);
//echo '<pre>';
//var_dump($dates);
//echo '</pre>';
//die();
foreach ($dates as $date) {
    echo $date . "<br>";
}

//20100330
//19700101
//20121115
//20130720