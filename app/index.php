<!DOCTYPE HTML>
<html>  
    <body>

        <form action="index.php" method="post" enctype="multipart/form-data">
            First Name: <input type="text" name="first_name"><br>
            Last Name: <input type="text" name="last_name"><br>
            File: <input type="file" name="fileToUpload" id="fileToUpload"><br>
            <input type="submit" name="submit">
        </form>

    </body>
</html>

<?php
require 'vendor/autoload.php';

$db = new Db("localhost", "root", "", "tree");
$fileUploader = new Upload();
//$fileUploader->setPrintError(true);

if (isset($_POST["submit"])) {




$fileUploader->getExtension($_FILES["fileToUpload"]); 
//$imgUploader->setDestination('files');
$fileUploader->uploadFile($_FILES["fileToUpload"]);
//$imgUploader->setAllowedExtensions(['txt','jpg']);


if($fileUploader->uploadFile($_FILES["fileToUpload"])==true) {
$sql = $db->insertRow("INSERT INTO `authors` (`first_name`,`last_name`) VALUES ( '".$_POST['first_name']. "','".$_POST['last_name']. "');");
}
}
$result = $db->getResults('SELECT * FROM authors');
foreach ($result as $row) {

    echo $row->first_name.'<br>';
    echo $row->last_name;
}
?>

