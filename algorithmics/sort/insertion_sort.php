<?php

$a = [16, 5, 12, 7, 19, 18, 1, 30];

function insertionSort($a) {
	$length = count($a);
	for ($i = 0; $i < $length - 1; $i++) {
		$key = $i + 1;
		$next= $a[$key];
		for ($j = ($i + 1); $j > 0; $j--) {
			if ($next < $a[$j - 1]) {
				$a[$j] = $a[$j - 1];
				$key = $j - 1;
			}
		}
		$a[$key] = $next;
    }
    return $a;
}

 var_dump(insertionSort($a));