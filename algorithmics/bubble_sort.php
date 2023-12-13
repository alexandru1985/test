<?php

$arr = [7, 3, 9, 6, 5, 1,25, 2, 0, 8, 4];
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
