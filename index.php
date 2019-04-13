<?php

class Test {

    public $no_days = 0;
    public $weekends = 0;

    public function deadline_status($deadline_time) {

        $begin = strtotime(date('d.m.Y'));
        $end = strtotime(date('d.m.Y', $deadline_time));


        while ($begin <= $end) {
            $this->no_days++; // no of days in the given interval
            $what_day = date("N", $begin);
            if ($what_day > 5) { // 6 and 7 are weekend days
                $this->weekends++;
            }
            $begin += 86400; // +1 day
        }
        $days = $this->no_days - $this->weekends;


        $status = '';

        if ($days == 0) {
            $status = '<span class="label ttip_b" style="background-color:#8c8c8c;">Expired</span>';
        } elseif ($days == 1) {
            $status = '<span class="label ttip_b" style="background-color:#ff4d4d;">Critical</span>';
        } elseif ($days >= 2 && $days <= 3) {
            $status = '<span class="label ttip_b" style="background-color:#e68a00;">Urgent </span>';
        } elseif ($days > 3) {
            $status = '<span class="label ttip_b" style="background-color:#058DC7;">Normal</span>';
        }

        return $status;
    }

}

$obj = new Test();
echo $obj->deadline_status(1499040000);


//echo strpos(‘axz’, ‘a’);
//	echo   $x = 3 + “15%” + “$25”;




echo '<br>';
$numbers = array(1, 2, 5, 7, 10, 18);
$countNumbers = count($numbers);
$sum = 0;
for ($i = 0; $i < $countNumbers; $i++) {
//  echo "The number is:  $numbers[$n]  <br>";
    echo "The increase sum = " . $sum = $sum + $numbers[$i];
    echo "<br>";
}
echo "Media = " . $media = $sum / $countNumbers;
echo "<br>";

$numbers = array(1, 2, 5, 7, 10, 17);
$countNumbers = count($numbers);
$par = 0;
$impar = 0;
for ($i = 0; $i < $countNumbers; $i++) {
//  echo "The number is:  $numbers[$n]  <br>";
    if ($numbers[$i] % 2 == 0) {
        $par += 1;
    } else {
        $impar += 1;
    }
}
echo "Numere pare = " . $par;
echo "<br>";
echo "Numere impare = " . $impar;
echo "<br>";


$produse = array(
    'laptop' => array(
        'Sony' => array('cod_vechi' => 'RPJ126', 'cod_nou' => ''),
        'HP' => array('cod_vechi' => 'RPJ126', 'cod_nou' => 'APJ128'),
        'Acer' => array('cod_vechi' => 'RPJ126', 'cod_nou' => 'RPT123')),
    'LCD' => array(
        'Sony' => array('cod_vechi' => 'RPJ126', 'cod_nou' => ''),
        'LG' => array('cod_vechi' => 'RPJ126', 'cod_nou' => 'TPJ126')),
    'Software' => array(
        'Produs1' => array('cod_vechi' => 'RPJ126', 'cod_nou' => ''),
        'Produs' => array('cod_vechi' => 'RPJ126', 'cod_nou' => 'TPJ126'))
);

foreach ($produse as $categorii => $brand) {
    foreach ($brand as $nume_brand => $cod) {
        foreach ($cod as $tip_cod => $nume_cod) {
            if ($tip_cod == 'cod_nou' && (strlen($nume_cod) > 0 )) {
                echo $categorii . ' ' . $nume_brand . ' ' . $tip_cod . ' ' . $nume_cod . '<br>';
            }
        }
    }
}

echo '<pre>';
print_r($produse);
echo '</pre>';
echo '<pre>';
var_dump($produse);
echo '</pre>';

function recursion(array $produse) {

    foreach ($produse as $categorii => $brand) {
        foreach ($brand as $nume_brand => $cod) {
            foreach ($cod as $tip_cod => $nume_cod) {
                if ($tip_cod == 'cod_nou' && (strlen($nume_cod) > 0 )) {
                    return $categorii . ' ' . $nume_brand . ' ' . $tip_cod . ' ' . $nume_cod . '<br>';
                }
            }
        }
    }
}

echo recursion($produse);

$sort = array(3, 6, 1, 8, 6, 4, -1);
$temp = 0;

for ($i = 0; $i < count($sort); $i++) {

    for ($j = 0; $j < count($sort) - 1; $j++) {

        if ($sort[$j] > $sort[$j + 1]) {
            $temp = $sort[$j];
            $sort[$j] = $sort[$j + 1];
            $sort[$j + 1] = $temp;
        }
    }
}

echo '<pre>';
print_r($sort);
echo '</pre>';



////////////////////////////////////////////////////////////////////////////////

$A[0] = 9;
$A[1] = 3;
$A[2] = 9;
$A[3] = 3;
$A[4] = 9;
$A[5] = 7;
$A[6] = 9;

function solution($A) {
    // Occurrences of integer in array
    $occurences = [];
    // Searching for unpaired integer
    foreach ($A as $integer) {
        if (!isset($occurences[$integer])) {
            // If integer didn't appeared till now
            $occurences[$integer] = 1;
        } else {
            // If pair is found, it is removed so only unpaired integer will remain
            unset($occurences[$integer]);
        }
    }
    $unpairedInteger = key($occurences);
    return $unpairedInteger;
}

echo solution($A);
echo '<br>';

$A = [1, 3, 6, 4, 1, 2];

echo '<pre>';
print_r(array_flip($A));
echo '</pre>';

function solution1($A) {
    $a = array_flip($A);
    for ($i = 1; isset($a[$i]); $i++)
        ;
    return $i;
}

//  for($i=1; in_array($i, $A); $i++);
//    return $i;
//echo solution1($A);


$A[0] = 3;
$A[1] = 4;
$A[2] = 3;
$A[3] = 2;
$A[4] = 3;
$A[5] = -1;
$A[6] = 3;
$A[7] = 3;

function solution2($A) {
    $count_elem_arr = count($A);
    $max_value = array_count_values($A);
    $leader = array_search(max($max_value), $max_value);
    $arr = [];
    foreach ($A as $key => $value) {
        if ($value == $leader) {
            $arr[] = $key;
        }
    }

    if ($count_elem_arr / 2 <= $leader) {

        return -1;
    } else {
        return $arr;
    }
}

$A[0] = 9;
$A[1] = 3;
$A[2] = 9;
$A[3] = 3;
$A[4] = 9;
$A[5] = 7;
$A[6] = 9;

function solution3($A) {
    $max_value = array_count_values($A);
    $arr = [];
    foreach ($max_value as $key => $value) {
        if ($value == 1) {
            $arr[] = $key;
        }
    }
    return implode('', $arr);
}
echo  'ABC';
echo solution3($A);





$array = array(1, 2, 3, 4);
$size = 4;

for ($i = $size - 1; $i >= 0; $i--) {
    echo $array[$i];
}
echo "<br>";
$num_list = array(1, 2, 4);

function missing_number($num_list) {
    // construct a new array
    $new_arr = range($num_list[0], max($num_list));
// use array_diff to find the missing elements 
    $test = array_diff($new_arr, $num_list);
    foreach ($test as $key => $value) {
        $value;
    }
    return $value;
}

//echo '<pre>';
//print_r(missing_number($num_list));
//echo '</pre>';

echo missing_number($num_list);


echo "<br>";

function build_table($array) {
    // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
    foreach ($array[0] as $key => $value) {
        $html .= '<th>' . htmlspecialchars($key) . '</th>';
    }
    $html .= '</tr>';

    // data rows
    foreach ($array as $key => $value) {
        $html .= '<tr>';
        foreach ($value as $key2 => $value2) {
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}

$array = array(
    array('first' => 'tom', 'last' => 'smith', 'email' => 'tom@example.org', 'company' => 'example ltd', 'price' => '2'),
    array('first' => 'hugh', 'last' => 'blogs', 'email' => 'hugh@example.org', 'company' => 'example ltd'),
    array('first' => 'steph', 'last' => 'brown', 'email' => 'steph@example.org', 'company' => 'example ltd')
);

echo build_table($array);

echo '<br>';
$var_name1 = 'a678';
if (is_numeric($var_name1)) {
    echo "$var_name1 is Numeric.<br>";
} else {
    echo "$var_name1 is not Numeric. <br>";
}

function checkDigits($str) {

    $str = explode(',', $str);
    $str = implode('', $str);

    if (is_numeric($str)) {
        return true;
    } else {
        return false;
    }
}

var_dump(checkDigits('6,7,8'));


$ssn = 119980102991;
echo substr($ssn, 9, 3);

function checkSSN($ssn) {

    $result = preg_match('/^[0-9]*$/', substr($ssn, 0, 1));
    $result = preg_match('/^[0-9]*$/', substr($ssn, 9, 1));
    $result = preg_match('/^[0-9]*$/', substr($ssn, 10, 1));
    $result = preg_match('/^[0-9]*$/', substr($ssn, 11, 1));

    return $result;
}

echo checkSSN('1199801021231');

$unu = 0 * 1;
$doi = 1 * 1;
$trei = 2 * 9;
$patru = 3 * 9;
$cinci = 4 * 8;
$sase = 5 * 0;
$sapte = 6 * 1;
$opt = 7 * 0;
$noua = 8 * 2;
$zece = 9 * 1;

echo '<br>';
$bool = '';

function ifInArray($needle, $haystack) {

    $needle = explode(',', $needle);
    $haystack = explode(',', $haystack);

    foreach ($needle as $element) {

        if (!in_array($element, $haystack)) {

            $bool = 0;
            break;
        }
    }

    if (isset($bool)) {
        return false;
    } else {
        return true;
    }
}

echo 'afadsfad';
echo '<br>';
var_dump(ifInArray('2,4', '2,3,4,5'));


$bundleName = array(
    'products' =>
    array('id' => '1', 'productName' => 'Product 1', 'price' => '20'),
    array('id' => '2', 'productName' => 'Product 2', 'price' => '40'),
    array('id' => '3', 'productName' => 'Product 3', 'price' => '10'),
    'bundle' =>
    array('id' => '1', 'bundleName' => 'Bundle 1', 'discount' => '20'),
    array('id' => '2', 'productName' => 'Product 2', 'price' => '40'),
    array('id' => '3', 'productName' => 'Product 3', 'price' => '10'),
);

class Validation {

    private $haystack = array(2,5,7,11);
   

    public function checkDigits($str) {

        $str = explode(',', $str);
        $str = implode('', $str);

        if (is_numeric($str)) {
            return true;
        } else {
            return false;
        }
    }

    public function ifInArray($needle, $haystack) {

        $needle = explode(',', $needle);

        foreach ($needle as $element) {

            if (!in_array($element, $haystack)) {

                $bool = 0;
                break;
            }
        }

        if (isset($bool)) {
            return false;
        } else {
            return true;
        }
    }

    public function check($str) {

        $error = '';
        //check digits exist
        if ($this->checkDigits($str) == false) {
            $error .= 'Only digits permetted.<br />';
        }
        //check if the argument is in array
        if ($this->ifInArray($str,$this->haystack) == false) {
            $error .= 'Argument is not in sequence.<br />';
        }
        return $error;
    }

}

$obj = new Validation();
echo $obj->check('2,5,9,a');

class Database {

    public static $instance;

    public static function getInstance() {

        if (!isset(Database::$instance)) {

            Database::$instance = new Database();
        }

        return Database::$instance;
    }

}

$obj = Database::getInstance();


class Thesaurus
{
    private $thesaurus;

    function Thesaurus($thesaurus)
    {
        $this->thesaurus = $thesaurus;
    }

    public function getSynonyms($word)
    {
        if (array_key_exists($word, $this->thesaurus)) {
   foreach ($this->thesaurus as $value) {
    echo $value;
}
}
    }
}

$thesaurus = new Thesaurus(
    array 
        (
            "buy" => array("purchase"),
            "big" => array("great", "large")
        )); 

echo $thesaurus->getSynonyms("big");
echo "\n";
echo $thesaurus->getSynonyms("agelast");

echo "<br>";
echo "/////////////////////////////";


$pattern = '/(wizard-duel-texts)|(wizard-duel-images)/';
$url = 'localhost/ucp/public/wizard-duel-texts/2901';
 if (preg_match_all($pattern, $url, $match)) {

//     echo "Test";
//     echo "<pre>";
//     var_dump($match);
//     echo "</pre>";
//     echo $match[0][0];
//     echo "<br>";
     echo $str = strstr($url, $match[0][0]);
     echo '<br>';
     echo str_replace($match[0][0].'/', '', $str);
 }
 echo '<br>';
 $url="index.php?page=task&view=list&pageNr=2";
 $pos = strpos($url, "&pageNr");
echo $url = substr($url, 0, $pos);
?>