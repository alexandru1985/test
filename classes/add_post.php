<?php

require 'Db.php';

$sql = $db->insertRow("INSERT INTO `authors` (`first_name`,`last_name`) VALUES ( '".$_POST['first_name']. "','".$_POST['last_name']. "');");

if(isset($sql)) {
    
    header('Location: index.php');
}