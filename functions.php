<?php
header('Content-Type: text/plain');
/// count

$cars=array("Volvo","BMW","Toyota");
echo count($cars);
echo '<br>';

/// is_array

$arr = array('this', 'is', 'an array');

echo is_array($arr) ? 'Array' : 'not an Array';
echo '<br>';

/// substr

echo substr("Hello world",6);
echo '<br>';

/// in_array

$os = array("Mac", "NT", "Irix", "Linux");
if (in_array("Irix", $os)) {
    echo "Got Irix";
}

$a = array('1.10', 12.4, 1.13);
if (in_array(1.13, $a, true)) {
    echo "1.13 found with strict check\n";
}

echo '<br>';

/// explode 

$input2 = "hello,there";

var_dump( explode( ',', $input2 ) );

//array(2)
//(
//    [0] => string(5) "hello"
//    [1] => string(5) "there"
//)

$str = 'one|two|three|four';

// positive limit
print_r(explode('|', $str, 2));

// negative limit (since PHP 5.1)
print_r(explode('|', $str, -1));

//Array
//(
//    [0] => one
//    [1] => two|three|four
//)
//Array
//(
//    [0] => one
//    [1] => two
//    [2] => three
//)

echo '<br>';

/// str_replace

// Provides: Hll Wrld f PHP
$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$onlyconsonants = str_replace($vowels, "", "Hello World of PHP");


// Provides: You should eat pizza, beer, and ice cream every day
$phrase  = "You should eat fruits, vegetables, and fiber every day.";
$healthy = array("fruits", "vegetables", "fiber");
$yummy   = array("pizza", "beer", "ice cream");

echo '<br>';

///  implode

$array = array('lastname', 'email', 'phone');
$comma_separated = implode(",", $array);

echo $comma_separated; // lastname,email,phone

echo '<br>';

/// strlen

$str = '1234';
echo strlen($str); // 4

echo '<br>';

/// array_merge

$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$result = array_merge($array1, $array2);
print_r($result);

//Array
//(
//    [color] => green
//    [0] => 2
//    [1] => 4
//    [2] => a
//    [3] => b
//    [shape] => trapezoid
//    [4] => 4
//)

/// strpos

// We can search for the character, ignoring anything before the offset
$newstring = 'abcdef abcdef';
$pos = strpos($newstring, 'a', 1); // $pos = 7, not 0

/// preg_match

preg_match('/(foo)(bar)(baz)/', 'foobarbaz', $matches, PREG_OFFSET_CAPTURE);
print_r($matches);

//Array
//(
//    [0] => Array
//        (
//            [0] => foobarbaz
//            [1] => 0
//        )
//
//    [1] => Array
//        (
//            [0] => foo
//            [1] => 0
//        )
//
//    [2] => Array
//        (
//            [0] => bar
//            [1] => 3
//        )
//
//    [3] => Array
//        (
//            [0] => baz
//            [1] => 6
//        )
//
//)


/// sprintf

$num = 5;
$location = 'tree';

$format = 'There are %d monkeys in the %s';
echo sprintf($format, $num, $location);

echo '<br>';

/// trim

$str = "Hello World!";
echo $str . "<br>";
echo trim($str,"Hed!");

//Hello World!
//llo Worl 

$str = " Hello World! ";
echo "Without trim: " . $str;
echo "<br>";
echo "With trim: " . trim($str);

//Without trim: Hello World!
//With trim: Hello World! 

/// file_exists

file_exists("webdictionary.txt");

//1

/// is_string

$a = "Hello";
echo "a is " . is_string($a) . "<br>";

//a is 1

echo "<br>";

// get_class
//Returns the name of the class of an object

class foo {
    function name()
    {
        echo "My name is " , get_class($this) , "\n";
    }
}

// create an object
$bar = new foo();

// external call
echo "Its name is " , get_class($bar) , "\n";

// internal call
$bar->name();


//Its name is foo
//My name is foo

/// array_key_exists

$search_array = array('first' => 1, 'second' => 4);
if (array_key_exists('first', $search_array)) {
    echo "The 'first' element is in the array";
}

/// array_keys

$array = array(0 => 100, "color" => "red");
print_r(array_keys($array));

/// array_map

function cube($n)
{
    return ($n * $n * $n);
}

$a = [1, 2, 3, 4, 5];
$b = array_map('cube', $a);
print_r($b);

//Array
//(
//    [0] => 1
//    [1] => 8
//    [2] => 27
//    [3] => 64
//    [4] => 125
//)

$func = function($value) {
    return $value * 2;
};

print_r(array_map($func, range(1, 5)));

//Array
//(
//    [0] => 2
//    [1] => 4
//    [2] => 6
//    [3] => 8
//    [4] => 10
//)

/// array_values
$array = array("size" => "XL", "color" => "gold");
print_r(array_values($array));

echo "<br>";

// htmlentities
$str = '<script>alert("test xss")</script>';

echo htmlspecialchars($str);
echo "<br>";
//&lt;script&gt;alert(&quot;test xss&quot;)&lt;/script&gt;

// filter_var

$str = '<script>alert("test xss");</script>';

echo filter_var($str, FILTER_SANITIZE_STRING);;

// alert(&#39;test xss&#39;);

// strip_tags

echo strip_tags('<script>alert("test xss")</script>');

// 

function odd($var)
{
    // întoarce true dacă numărul întreg transmis este impar
    return($var & 1);
}

function even($var)
{
    // întoarce true dacă numărul întreg transmis este par
    return(!($var & 1));
}

$array1 = array("a"=>1, "b"=>2, "c"=>3, "d"=>4, "e"=>5);
$array2 = array(6, 7, 8, 9, 10, 11, 12);

echo "Odd :\n";
print_r(array_filter($array1, "odd"));
echo "Even:\n";
print_r(array_filter($array2, "even"));

//Read entire file:

$file = fopen("test.txt","r");
fread($file,filesize("test.txt"));
fclose($file);


