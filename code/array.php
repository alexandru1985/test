<?php
$tari = array('Romania' => array('Iasi'), 'Bulgaria', 'Serbia', 'Ungaria');

echo "<pre>";
var_dump($tari);
echo "</pre>";

//array(4) {
//  ["Romania"]=>
//  array(1) {
//    [0]=>
//    string(4) "Iasi"
//  }
//  [0]=>
//  string(8) "Bulgaria"
//  [1]=>
//  string(6) "Serbia"
//  [2]=>
//  string(7) "Ungaria"
//}
// Adaugare valori intr-un array

$tari[] = 'Spania';

echo "<pre>";
var_dump($tari);
echo "</pre>";

//array(5) {
//  ["Romania"]=>
//  array(1) {
//    [0]=>
//    string(4) "Iasi"
//  }
//  [0]=>
//  string(8) "Bulgaria"
//  [1]=>
//  string(6) "Serbia"
//  [2]=>
//  string(7) "Ungaria"
//  [3]=>
//  string(6) "Spania"
//}
//// Va suprascrie orasul Iasi
//   $tari['Romania']='Cluj';
//// Va adauga inca un oras la cheia Romania
$tari['Romania'][] = 'Cluj';


echo "<pre>";
var_dump($tari);
echo "</pre>";

//array(5) {
//  ["Romania"]=>
//  array(2) {
//    [0]=>
//    string(4) "Iasi"
//    [1]=>
//    string(4) "Cluj"
//  }
//  [0]=>
//  string(8) "Bulgaria"
//  [1]=>
//  string(6) "Serbia"
//  [2]=>
//  string(7) "Ungaria"
//  [3]=>
//  string(6) "Spania"
//}
// Chiar daca nu exista cheia Italia o va crea

$tari['Italia'] = 'Roma';

echo "<pre>";
var_dump($tari);
echo "</pre>";

//array(6) {
//  ["Romania"]=>
//  array(2) {
//    [0]=>
//    string(4) "Iasi"
//    [1]=>
//    string(4) "Cluj"
//  }
//  [0]=>
//  string(8) "Bulgaria"
//  [1]=>
//  string(6) "Serbia"
//  [2]=>
//  string(7) "Ungaria"
//  [3]=>
//  string(6) "Spania"
//  ["Italia"]=>
//  string(4) "Roma"
//}
// Va crea cheia Iasi in array-ul Romania
$tari['Romania']['Iasi'] = 'Cartier 1';

echo "<pre>";
var_dump($tari);
echo "</pre>";

//array(6) {
//  ["Romania"]=>
//  array(3) {
//    [0]=>
//    string(4) "Iasi"
//    [1]=>
//    string(4) "Cluj"
//    ["Iasi"]=>
//    string(9) "Cartier 1"
//  }
//  [0]=>
//  string(8) "Bulgaria"
//  [1]=>
//  string(6) "Serbia"
//  [2]=>
//  string(7) "Ungaria"
//  [3]=>
//  string(6) "Spania"
//  ["Italia"]=>
//  string(4) "Roma"
//}
// Modificare valori din array

$tari['Romania'][1] = 'Timisoara';
$tari['Romania']['Iasi'] = 'Cartier 2';
$tari[] = 'Franta';

echo "<pre>";
var_dump($tari);
echo "</pre>";

//array(7) {
//  ["Romania"]=>
//  array(3) {
//    [0]=>
//    string(4) "Iasi"
//    [1]=>
//    string(9) "Timisoara"
//    ["Iasi"]=>
//    string(9) "Cartier 2"
//  }
//  [0]=>
//  string(8) "Bulgaria"
//  [1]=>
//  string(6) "Serbia"
//  [2]=>
//  string(7) "Ungaria"
//  [3]=>
//  string(6) "Spania"
//  ["Italia"]=>
//  string(4) "Roma"
//  [4]=>
//  string(6) "Franta"
//}
echo '<br>';
echo $encodeData = json_encode($tari);
$decodeData = json_decode($encodeData, true);
echo "<pre>";
var_dump($decodeData);
echo "</pre>";

echo $decodeData['Romania'][0];

echo '<br>';
?>
<script>

    var JSON = {
        "Romania": {
            "0": "Iasi",
            "1": "Timisoara",
            "Iasi": "Cartier 2"
        },
        "0": "Bulgaria",
        "1": "Serbia",
        "2": "Ungaria",
        "3": "Spania",
        "Italia": "Roma",
        "4": "Franta"
    }
    
    document.write(JSON.Romania.Iasi);
</script>    