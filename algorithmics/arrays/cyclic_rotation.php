<?php

/* 
An array A consisting of N integers is given. Rotation of the array means that each element is shifted right by one index,
and the last element of the array is moved to the first place. 
For example, the rotation of array A = [3, 8, 9, 7, 6] is [6, 3, 8, 9, 7] 
(elements are shifted right by one index and 6 is moved to the first place).

The goal is to rotate array A K times; that is, each element of A will be shifted to the right K times.

Write a function:

    function solution($arr, $k);

that, given an array A consisting of N integers and an integer K, returns the array A rotated K times.

For example, given
    A = [3, 8, 9, 7, 6]
    K = 3

the function should return [9, 7, 6, 3, 8]. Three rotations were made:
    [3, 8, 9, 7, 6] -> [6, 3, 8, 9, 7]
    [6, 3, 8, 9, 7] -> [7, 6, 3, 8, 9]
    [7, 6, 3, 8, 9] -> [9, 7, 6, 3, 8]

For another example, given
    A = [0, 0, 0]
    K = 1

the function should return [0, 0, 0]

Given
    A = [1, 2, 3, 4]
    K = 4

the function should return [1, 2, 3, 4]

Assume that:

        N and K are integers within the range [0..100];
        each element of array A is an integer within the range [−1,000..1,000].

In your solution, focus on correctness. The performance of your solution will 
not be the focus of the assessment.

 */

$arr = [3, 8, 9, 7, 6];
$k = 3;
$countRotation = 0;

function rotation($arr, $k) {
    global $countRotation;
    $countRotation++;
    $length = count($arr);
    $newArr = [];

    if($countRotation <= $k) {
        for ( $i = 0; $i <  $length - 1; $i++ ) {
            if($i == 0) {
                $newArr[$i] = $arr[$length - 1];
            }
            $newArr[$i+1] =  $arr[$i];
        }
        return rotation($newArr,$k);
    }
    else {
        return $arr;
    }
 
}

echo "<pre>";
var_dump(rotation($arr,$k)); 
echo "<pre/>";


$arr = [3, 8, 9, 7, 6];
$k = 3;


function solution1($arr, $k) {
    $countRotation = 0;
    $rotation = true;

    while ($rotation == true) {
        $countRotation++;
        $newArr = [];      
        $length = count($arr);

        if($countRotation <= $k) {
            for ( $i = 0; $i <  $length - 1; $i++ ) {
                if($i == 0) {
                    $newArr[$i] = $arr[$length - 1];
                    
                }
                $newArr[$i+1] =  $arr[$i];
            }
            $arr = $newArr;
        }
        else {
            $rotation = false;
        }
    }

    return $arr;
}

// echo "<pre>";
// var_dump(solution($arr,$k)); 
// echo "<pre/>";

function solution($arr, $k) {
    $length = count($arr);

    for($i=1; $i <= $k; $i++) {
        $newArr = [];      
            for ( $j = 0; $j <  $length - 1; $j++ ) {
                if($j == 0) {
                    $newArr[$j] = $arr[$length - 1];                 
                }
                $newArr[$j+1] =  $arr[$j];
            }
            $arr = $newArr;
    }

    return $arr;
}

echo "<pre>";
var_dump(solution($arr,$k)); 
echo "<pre/>";
