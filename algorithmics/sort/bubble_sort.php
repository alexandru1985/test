<?php

$arr  = [ 16, 5, 13, 7, 19, 18, 1, 30 ];

function bubbleSort( $arr ) {
  $length = count( $arr );
  $comparisons  = 0;

  for ( $i = 0; $i < $length; $i++ ) {
    for ( $j = 0; $j < $length - 1; $j++ ) {
      $comparisons++;
      var_dump($arr[ $j ]);
      if ( $arr[ $j ] > $arr[ $j + 1 ] ) {


        $next            = $arr[ $j + 1 ];
        var_dump( $next );
        $arr[ $j + 1 ]  = $arr[ $j ];
        var_dump(  $arr[ $j + 1 ] );
        $arr[ $j ]      = $next;
        var_dump($arr[ $j ]);
        echo "<br>";
        var_dump($arr);
        echo "<br>";
        echo "####";

      } // end of if conditional

    } // end of inner for loop
    echo "<br>";
    echo $comparisons;
    echo "<br>";
    echo  implode( ', ', $arr );
    echo "<br>";
    // if($i == 2) {
    //     die();
    // }
  } // end of first for loop
  echo '<h4>' . $comparisons . ' Comparisons</h4>';
  return $arr;
} // end of bubbleSort()


echo '<strong>Before Sorting</strong><br>' . implode( ', ', $arr ) . '<br>';
$sorted = bubbleSort( $arr );
echo '<strong>After Sorting</strong><br>' . implode( ', ', $sorted );