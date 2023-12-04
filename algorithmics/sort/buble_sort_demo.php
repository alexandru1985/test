<?php

$arr  = [ 16, 5, 12, 7, 19, 18, 1, 30 ];

function bubbleSort($arr) {
  $length = count($arr);

  for ($i = 0; $i < $length; $i++) {
    for ($j = 0; $j < $length - 1; $j++) {
        if ($arr[$j] > $arr[$j + 1]) {
            $next = $arr[$j + 1];
            $arr[$j + 1] = $arr[$j];
            $arr[$j] = $next;

        } // end of if conditional

    } // end of inner for loop

  } // end of first for loop
  return $arr;
} 

echo '<strong>Before Sorting</strong><br>' . implode( ', ', $arr ) . '<br>';
$sorted = bubbleSort( $arr );
echo '<strong>After Sorting</strong><br>' . implode( ', ', $sorted );






$arr = [16, 5, 12, 7, 19, 18, 1, 30];

function bubbleSort1($arr) {
    $length = count($arr);

    for($i = 0; $i < $length; $i++) {
        for($j = 0; $j < $length - 1; $j++) {
            if($arr[$j] > $arr[$j+1]) {
                $next = $arr[$j+1];
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $next;
            }

        }
    }
    return $arr;
}

echo "<br>";
echo '<strong>Before Sorting</strong><br>' . implode( ', ', $arr ) . '<br>';
$sorted = bubbleSort1( $arr );
echo '<strong>After Sorting</strong><br>' . implode( ', ', $sorted );