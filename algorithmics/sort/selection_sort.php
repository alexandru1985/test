<?php


$a = [16, 5, 12, 7, 19, 18, 1, 30];

function selectionSort($arr)
{
    $arrLength = count($arr);
    for($i = 0; $i < $arrLength; ++$i) {
        for($j = $i+1; $j < $arrLength; ++$j) {
            if($arr[$j] < $arr[$i]) {
                $min = $arr[$j];
                $arr[$j] = $arr[$i];
                $arr[$i] = $min;
            }
        }
    }
    return $arr;
}

var_dump(selectionSort($a));