<?php

require 'autoload.php';

$imgUploader = new Upload();
$imgUploader->setPrintError(true);
$db = new Db("localhost", "root", "", "tree");
//store errors
$errors = '';
$imgUploader->getExtension($_FILES["fileToUpload"]); 
//$imgUploader->setDestination('files');
$imgUploader->uploadFile($_FILES["fileToUpload"]);
//$imgUploader->setAllowedExtensions(['txt','jpg']);

$errors .= $imgUploader->error;
//echo '<pre>';
////var_dump($imgUploader->setDestination('files').'/'.basename($_FILES["fileToUpload"]["name"]));
//var_dump($imgUploader->uploadFile($_FILES["fileToUpload"]));
//echo '</pre>';
//die();
$sql = $db->insertRow("INSERT INTO `authors` (`first_name`,`last_name`) VALUES ( '".$_POST['first_name']. "','".$_POST['last_name']. "');");

if(isset($sql)) {
    
    header('Location: index.php');
}