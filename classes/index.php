<!DOCTYPE HTML>
<html>  
<body>

    <form action="add_post.php" method="post" enctype="multipart/form-data">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
File: <input type="file" name="fileToUpload" id="fileToUpload"><br>
<input type="submit">
</form>

</body>
</html>

<?php

require 'Db.php';
require 'Upload.php';


$imgUploader = new Upload;
$imgUploader->setPrintError(FALSE);
 
//store errors
$errors = '';
 
$imgUploader->setDestination($_SERVER['DOCUMENT_ROOT'] . '/files');
$imgUploader->setAllowedExtensions('jpg','txt');
//$imgUploader->setFileName('user_profile.jpg');
$imgUploader->upload($_FILES['fileToUpload']);
$errors .= $imgUploader->error;
 

 
//if ($errors) print $errors;



$result = $db->getResults('SELECT * FROM authors');

foreach ($result as $row) {

    echo $row->first_name;
    echo $row->last_name;
}

?>

