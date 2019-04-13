<?php

function solution($A, $key) {

    $countArr = count($A);
    
    for ($i = 0; $i <= count($A) - 1; $i++) {

        if ($i < $key) {
            $newArr[$i] = $A[$i + $countArr - $key];
        } else {
            $newArr[$i] = $A[$i - $key];
        }

    }

    return $newArr;
}


function solutionTest($A, $key) {
    
    
    for($j = 1; $j<=7; $j++) {
        for ($i = 0; $i <= count($A) - 2; $i++) {

            $newArr[0] = $A[count($A) - 1];
            $newArr[$i+1] = $A[$i];
    

        

    }
    }
    return $newArr;
    
    
}





$array = [3, 8, 9, 7, 6];
$test = solutionTest($array, 2);
echo '<pre>';
var_dump($test);
echo '</pre>';
//
//For example, given
//    A = [3, 8, 9, 7, 6]
//    K = 3
//
//the function should return [9, 7, 6, 3, 8]. Three rotations were made:
//    [3, 8, 9, 7, 6] -> [6, 3, 8, 9, 7]
//    [6, 3, 8, 9, 7] -> [7, 6, 3, 8, 9]
//    [7, 6, 3, 8, 9] -> [9, 7, 6, 3, 8]


function solution1($A) {
    
     $arrCountValues = array_count_values($A);
     $arr = array_flip($arrCountValues);
     
     return $arr[1];
}

//$array1 = [5, 3, 5, 3, 5, 7, 5 ];
//$test1 = solution1($array1);
//
//echo '<pre>';
//var_dump($test1);
//echo '</pre>';

