<?php
require 'Db.php';
$db = new Db();

//$state_id = rand(1, 6);
//$arr_first_name = ["Alex", "Aaron", "Ben", "Carl", "Dan", "David", "Edward", "Fred", "Frank", "George", "Hal", "Hank", "Ike", "John", "Jack", "Joe", "Larry", "Monte", "Matthew", "Mark", "Nathan", "Otto", "Paul", "Steve", "Thomas", "Tim", "Victor", "Walter"];
//$first_name = $arr_first_name[rand(0,27)];
//$arr_last_name = ["Anderson", "Ashwoon", "Aikin", "Bongard", "Bowers", "Boyd", "Dewalt", "Ebner", "Haworth", "Hesch", "Kassing", "Knutson", "Lawless", "Lawicki", "McCord", "McCormack", "Miller", "Myers", "Nugent", "Orwig", "Paiser", "Pak", "Pettigrew", "Quinn", "Ramachandran", "Resnick", "Sagar", "Schickowski", "Schiebel", "Sellon", "Severson", "Shaffer", "Solberg", "Sonderling", "Soukup", "Stahl", "Trussel", "Uflan", "Ulrich", "Upson", "Vader", "Van Zandt", "Vanderpoel", "Vogal", "Wagle", "Wagner"];
//$last_name = $arr_last_name[rand(0,45)];

//for($i=1; $i <= 3000 ; $i++) {
//    $state_id = rand(1, 6);
//    $arr_first_name = ["Alex", "Aaron", "Ben", "Carl", "Dan", "David", "Edward", "Fred", "Frank", "George", "Hal", "Hank", "Ike", "John", "Jack", "Joe", "Larry", "Monte", "Matthew", "Mark", "Nathan", "Otto", "Paul", "Steve", "Thomas", "Tim", "Victor", "Walter"];
//    $first_name = $arr_first_name[rand(0,27)];
//    $arr_last_name = ["Anderson", "Ashwoon", "Aikin", "Bongard", "Bowers", "Boyd", "Dewalt", "Ebner", "Haworth", "Hesch", "Kassing", "Knutson", "Lawless", "Lawicki", "McCord", "McCormack", "Miller", "Myers", "Nugent", "Orwig", "Paiser", "Pak", "Pettigrew", "Quinn", "Ramachandran", "Resnick", "Sagar", "Schickowski", "Schiebel", "Sellon", "Severson", "Shaffer", "Solberg", "Sonderling", "Soukup", "Stahl", "Trussel", "Uflan", "Ulrich", "Upson", "Vader", "Van Zandt", "Vanderpoel", "Vogal", "Wagle", "Wagner"];
//    $last_name = $arr_last_name[rand(0,45)];
//    $age = rand(20,50);
//    $sql = $db->insertRow("INSERT INTO `customer` (`state_id`,`first_name`,`last_name`,`age`) VALUES ( '".$state_id."', '".$first_name."', '".$last_name."', '".$age."');");
//}
for($i=1; $i <= 3000 ; $i++) {
    $customer_id = rand(300, 400);
    $product_id = rand(1,12);
    $sql = $db->insertRow("INSERT INTO `customer_product` (`customer_id`,`product_id`) VALUES ( '".$customer_id."', '".$product_id."');");
}