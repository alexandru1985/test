<?php

// 1. 6
// 2. 5

$a = 0;

if ($a) {
    //if($a==0) este corect
    //var_dump($a);
    for ($i = 1; $i < 3; $i++)
        echo $i;
    echo 'text';
}

// 3. 2

$a = 3;

if ($a == 2) {
    echo 'ramura 1';
} else if ($a == 3) {
    echo 'ramura 2';
} else {
    echo 'ramura 3';
}
echo '<br>';
//else {
//    echo 'ramura 4';
//}
// 4. 2

$a = 5;
if ($a != 5) {
    echo '5';
} else {
    echo '6';
}
echo '<br>';

// 5. 3
$i = 5;

while ($i > 0) {
    echo $i = $i - 1;
}

echo '<br>';

// 6. 1

$i = 5;
//$i++; = 
do {
    echo $i++;
} while ($i < 0);

echo '<br>';

// 7. 4
for ($i = 0; $i < 100; $i++) {
    echo $i;
    echo 'text';
    if ($i == 50)
        break;
}

echo '<br>';

// 8. 3
for ($i = 0; $i < 100; $i++) {
//    echo 'text';
//    echo $i;
    if ($i == 50)
        continue;
    echo 'text';
    echo $i;
}

echo '<br>';

// 9. 4
// 10. 3

$a = 1;

switch ($a) {
    case 1:
        echo '1';
    case 2:
        echo '2';
    case 3:
        echo '3';
        break;
    default:
        echo 'altceva';
        break;
}

echo '<br>';

// 11. 4

$a = 1;
$x = 1;

function functia_mea($x) {
    $a = $x;
}

echo $x = functia_mea(10);
var_dump($x);
echo $a;

// 12. 5
echo '<br>';

// 13. 2

$a = 5;
$b = &$a;
$c = $a;

$a++;

echo $a . $b . $c;

echo '<br>';

// 14. 3

$a = 5;

function functia_mea1($x) {
    global $a;
    $a = $x;
    $a = 4;
    return $a;
}

echo functia_mea1(2);

// 15. 1,3
// 16. 1

$a = 1;
$b = 2;
echo '<br>';
function aduna($a, $b) {

    $c = $a + $b;
//   return $c;
}

echo 'test'.$c = aduna(2, 3);
var_dump($c);
echo '<br>';

// 17. 1 

$z = 10;
$x = 2;

function aduna1($x, $y) {
    $z = 0;
    $s = $x + $y + $z;
    return $s;
}

echo $s = aduna1(3, 4);
echo '<br>';

// 18. 3 

function functia_mea2($x = 1, $y, $z) {
    $s = $x + $y + $z;
    return $s;
}

//echo $s = functia_mea2(3, 4);
echo '<br>';

// 19. 3

function medie_speciala($x, $y, $z = 5) {
    $m = ($x + $y + $z) / 3;
    return $m;
}

echo $x = medie_speciala(3, 4);
echo '<br>';
// 20. 3

$x = 'a';
$a = 3;
echo $$x;

//It creates a dynamic variable name. E.g.

$link = 'foo';
$$link = 'bar';    // -> $foo = 'bar'
//echo $foo; // foo is name of string above
// prints 'bar'
//$real_variable = 'test';
//$name = 'real_variable';
//echo $$name;
echo '<br>';

// 21. 4

$y = 3;
$x = 1;

function modifica($y) {
    $y++;
    $x = 2;
}

modifica($y);

echo $x . $y;
echo '<br>';
// 22. 3

$a = 10;

function modifica1(&$x) {

    $x--;
    return $x;
}

echo modifica1($a);
echo '<br>';
// 23. 2,5

$x = 1;
$y = 2;

function suma(&$a, $b) {
    $a++;
    $b++;
    $suma = $a + $b;
    return $suma;
}

echo suma($x, $y);
echo '<br>';
// 24. 1
// 25. 2

function medie() {
 return $numargs = func_num_args();  
 //return $numargs = func_get_args();  
}

echo medie(1,2,3,4);
