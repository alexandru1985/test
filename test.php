<?php

$counter = 0;
for ($x = 0; $x < 5; $x += 2 /* $x=2 */) {
    echo $counter++;
}
echo "<br>";
$str = 'abc';



echo strpos($str, 'a') ? 'minor' : 'major';

echo "<br>";
$_COOKIE['cookie_name'] = "A";

setcookie($_COOKIE['cookie_name'], 'B', time() + 3600); // 86400 = 1 day

echo $_COOKIE['cookie_name'];
echo "<br>";

$arr = array('name' => 'George', 'luckyNumbers' => array(2, 4, 8, 16));

echo json_encode($arr);

echo "<br>";

$arr = array(1, 2, 3);

foreach ($arr as $value) {
    $value *= 2; // citeste ultima valoare care este 3*2 = 6
}

echo array_sum($arr) + $value;

for ($x = 1; $x <= 100; $x++) {
    if ($x % 3 == 0) {
        echo "Fizz";
        echo '<br>';
    }

    if ($x % 5 == 0) {
        echo "Buzz";
        echo '<br>';
    }

    if ($x % 3 == 0 && $x % 5 == 0) {
        echo "FizzBuzz";
        echo '<br>';
    }
}
echo '<br>';

class Person {

    public $name;

}

$george = new Person();
$george->name = "George";

//$george =$paul;
// $paul->name="Paul";
// echo $george->name="George" .  $paul->name="Paul";


class Automobile {

    private $vehicleMake;
    private $vehicleModel;

    public function __construct($make, $model) {
        $this->vehicleMake = $make;
        $this->vehicleModel = $model;
    }

    public function getMakeAndModel() {
        return $this->vehicleMake . ' ' . $this->vehicleModel;
    }

}

class AutomobileFactory {

    public static function create($make, $model) {
        return new Automobile($make, $model);
    }

}

$veyron = AutomobileFactory::create('Bugatti', 'Veyron');

print_r($veyron->getMakeAndModel());

function seoUrl($string) {

    $string = trim($string); // Trim String

    $string = strtolower($string); //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )

    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);  //Strip any unwanted characters

    $string = preg_replace("/[\s-]+/", " ", $string); // Clean multiple dashes or whitespaces

    $string = preg_replace("/[\s_]/", "-", $string); //Convert whitespaces and underscore to dash

    return $string;
}

echo "<br>";
echo seoUrl("Lorem ipsum dolor sit amet,  at verterem adversarium his, at duo malis utroque. Ut pri omittam disputando.");

echo "<br>";
$x = 10;
$x++;
echo $x;
echo "<br>";

$x = 1;

while ($x <= 5) {
    echo "The number is: $x <br>";
    $x++;
}

$test1 = 20;
$test1 = '123';

var_dump($test1);



// SELECT * FROM `products` 
// SELECT DISTINCT price from products
// SELECT COUNT(DISTINCT price) FROM products
// SELECT * FROM `products` WHERE price > 50 
// SELECT * FROM `products` WHERE productName = 'Product 1' 
// SELECT * FROM `products` WHERE productName = 'Product 1' AND price = '20' 
// SELECT * FROM `products` WHERE NOT productName = 'Product 1' 
// SELECT * FROM `products` ORDER BY price DESC 
// UPDATE products SET price = 25 WHERE id = 1 
// SELECT * FROM `products` LIMIT 3 
// SELECT MIN(price) as SmallestPrice FROM products
// SELECT MAX(price) as LargestPrice FROM products
// SELECT COUNT(*) FROM `products` optional WHERE
// SELECT AVG(price) FROM products optional WHERE
// SELECT SUM(price) FROM products optional WHERE
// SELECT * FROM `products` WHERE price IN (30,40)
// SELECT * FROM `products` WHERE price BETWEEN 30 AND 80 
/* SELECT bundleId, productId, products.productName, products.price, bundles.bundleName, bundles.discount FROM bundle_products
  INNER JOIN products ON bundle_products.productId = products.id
  INNER JOIN bundles ON bundle_products.bundleId = bundles.id */

// SELECT COUNT(CustomerID), Country FROM Customers
// GROUP BY Customers
// ORDER BY COUNT(CustomerID) DESC;


echo ( function($x) {
    return [$x, $x + 1, $x + 2];
} )(4) [2];

echo '<br>';

function randStr($len) {

    $result = "";
    $chars = "abcdefghijklmnopqurstuwxyz0123456789";
    $charArray = str_split($chars);
   
    for ($i = 0; $i < $len; $i++) {

        $randItem = array_rand($charArray);

        $result .= "".$charArray[$randItem];


    }
       return $result;
}

echo randStr(32);
