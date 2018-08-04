<?php

echo ( function($x) {
    return [$x, $x + 1, $x + 2];
} )(4) [2];

$a = null;
$b = 1;
$c = 'c';
echo $a ?? '!a';
echo $b ?? '!b';
echo $c ?? '!c';
echo $d ?? '!d';

echo '<br>';
echo 1 <=> 2;
echo 'aa' <=> 'zz';
echo [1, 2, 3] <=> [7, 8, 9];


echo '<br>';

interface Additionable {

    public function add($x, $y);
}

function average($a, $b) {
    $anon = new class implements Additionable {

        public function divide($x, $y) {
            return $x / $y;
        }

        public function add($x, $y) {
            return $x + $y;
        }
    };

    $sum = $anon->add($a, $b);
    $average = $anon->divide($sum, 2);

    return $average;
}

echo average(10, 70);

echo '<br>';
try {
    '....';
} catch (MyEx1 $e) {
    logError($e);
} catch (MyEx2 $e) {
    logError($e);
} catch (MyEx3 $e) {
    logError($e);
}

echo '<br>';

//abstract class A {
//    abstract public function f();
//}
//
//(new anonymousclass extends A {
//    public function f() {
//        echo 'Hello World';
//    }
//})->f();
// A parse error because anonymous classes cannot extend abstract classes.
//How does the combined comparison operator ("<=>") work when comparing strings?


$testNumbers = array("20", "14", "18", "15", "27");

function getSecondNumber($numbers) {

    rsort($numbers);
    return $numbers[1];
}

echo getSecondNumber($testNumbers);

function isPowerOfTwo($n) {
    if (($n & ($n - 1)) == 0) {
        return "$n is power of 2";
    } else {
        return "$n is not power of 2";
    }
}

echo isPowerOfTwo(4) . '<br>';
echo isPowerOfTwo(10) . '<br>';
echo isPowerOfTwo(16);


$arrayTest = array(10, 11, 12, 13, 14, 16, 11, 16, 17);

function missingNumber($numList) {

    $newArr = range($numList[0], max($numList));
    return array_diff($newArr, $numList);
}

print_r(missingNumber($arrayTest));

echo '<br>';

function getIdentical($numList) {
    
    $maxValue = array_count_values($numList);
    $arr = [];
    foreach ($maxValue as $key => $value) {
        if ($value > 1) {
            $arr[] = $key;
        }
    }
    return implode(',', $arr);
}

echo getIdentical($arrayTest);



//What is wrong with the following query?
//"SELECT * FROM table WHERE id = $_POST[ 'id' ]"?
//
//Rewrite the query taking into account the best practices.

//The code is vulnarable to SQL injection.
//
//$con=mysqli_connect("localhost","my_user","my_password","my_db");
//$id = mysqli_real_escape_string($con, $_POST['id']);
//
//$sql = "SELECT * FROM table WHERE id = $id";
?>
