<?php
require 'autoload.php';

$db = new Db("localhost", "root", "", "test");



for($i=1;$i<=400;$i++){
//$names = array(
//    'Christopher',
//    'Ryan',
//    'Ethan',
//    'John',
//    'Zoey',
//    'Sarah',
//    'Michelle',
//    'Samantha',
//);
// 
////PHP array containing surnames.
//$surnames = array(
//    'Walker',
//    'Thompson',
//    'Anderson',
//    'Johnson',
//    'Tremblay',
//    'Peltier',
//    'Cunningham',
//    'Simpson',
//    'Mercado',
//    'Sellers'
//);
// 
////Generate a random forename.
//$random_name = $names[mt_rand(0, sizeof($names) - 1)];
// 
////Generate a random surname.
//$random_surname = $surnames[mt_rand(0, sizeof($surnames) - 1)];
// 
////Combine them together and print out the result.
//$random_name . ' ' . $random_surname;
//    $query = "INSERT INTO `client` (`ClientId`, `ClientName`) VALUES ('$i','$random_name $random_surname' )";
    
    
    
    
//    $query = "INSERT INTO `expeditions` (`AWBNumber`, `ClientId`, `Date`, `AWBValue`) VALUES 
//            (
//                '".rand ( 10000 , 99999 )."',
//                '".rand ( 10, 99 )."',
//                '".rand( strtotime('01 June 2016'), strtotime('01 September 2016'))."',
//                '".(rand( 10000 , 99999 ) / 10)."' 
//            )";
//    
//
//    
//    
//    
//
//    
//    
//    
//    
//    
//$db->insertRow($query);


}
/* 
   DELETE FROM expeditions
    WHERE Id NOT IN (SELECT * 
    FROM (SELECT MIN(Id)
      FROM expeditions
      GROUP BY ClientId) x) 
 
 */
/* 
 DELETE FROM expeditions
 
 */
/* 
 ALTER TABLE expeditions AUTO_INCREMENT = 1
 
 */
/* 
SELECT ClientName, COUNT(AWBNumber) FROM client 
 INNER JOIN expeditions ON client.ClientId = expeditions.ClientId GROUP BY ClientName
 
 */

//echo strtotime('01 June 2016').'<br>'; // 1464732000
//echo strtotime('30 June 2016');        // 1467237600

/* SELECT ClientName, COUNT(AWBNumber) FROM client 
   INNER JOIN expeditions ON client.ClientId = expeditions.ClientId 
   WHERE expeditions.Date BETWEEN 1464732000 AND 1467237600 GROUP BY ClientName
 */
/*
 SELECT ClientName, COUNT(AWBNumber), SUM(AWBValue) 
 FROM client INNER JOIN 
 expeditions ON client.ClientId = expeditions.ClientId 
 WHERE expeditions.Date BETWEEN 1464732000 AND 1467237600 
 GROUP BY ClientName
  */