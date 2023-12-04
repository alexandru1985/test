<?php

function calculate_date_diff($end_date, $start_date) {

    $days_to_each_month = array("01" => 31, "02" => 28, "03" => 31, "04" => 30, "05" => 31, "06" => 30, "07" => 31, "08" => 31, "09" => 30, "10" => 31, '11' => 30, '12' => 31);

    $month_end_date = explode("-", $end_date)[1];
    $month_start_date = explode("-", $start_date)[1];
    $days_end_date = explode("-", $end_date)[2];
    $days_start_date = explode("-", $start_date)[2];
    $period_types = array('month_end_date' => $month_end_date, 'month_start_date' => $month_start_date);
    $days_list = array();

    foreach ($period_types as $period_type => $month) {
        foreach ($days_to_each_month as $key_month => $days) {
            $days_list[] = $days;
            if ($period_type == 'month_end_date' && $key_month == $month) {
                unset($days_list[count($days_list) - 1]);
                $total_days_end_date = array_sum($days_list) + $days_end_date;
                break;
            }
            if ($period_type == 'month_start_date' && $key_month == $month) {
                unset($days_list[count($days_list) - 1]);
                $total_days_start_date = array_sum($days_list) + $days_start_date;
                break;
            }
        }
        $days_list = array();
    }
    return $total_days_end_date - $total_days_start_date;
}

echo calculate_date_diff("2019-08-10", "2019-01-25");

echo '<br>';

$arr = array(7, 3, 9, 6, 5, 1,25, 2, 0, 8, 4);
$sortedArr = bubbleSort($arr);
echo '<pre>';
var_dump($sortedArr);
echo '</pre>';
function bubbleSort(array $arr) {
    $sorted = true;
    while ($sorted == true) {
        $sorted = false;
        for ($i = 0; $i < count($arr)-1; $i++) {
            $current = $arr[$i];
            $next    = $arr[$i+1];
            if ($next < $current) {
                $arr[$i]   = $next;
                $arr[$i+1] = $current;
                $sorted    =  true;
            }
        }
    }
    return $arr;
}