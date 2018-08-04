<!DOCTYPE HTML>
<html>  
    <body>
        <form action="index.php" method="post">
            <table style="width:20%">
                <tr>
                    <td>Total Parking Spaces</td>
                    <td><input type="text" name="totalParkingSpaces"></td>
                </tr>
                <tr>
                    <td>Pollution Buffer</td>
                    <td><input type="text" name="pollutionBuffer"></td>               
                </tr>
                <tr>
                    <td>Total Actions X</td>
                    <td><input type="text" name="totalActions"></td>               
                </tr>
            </table>

            <input type="submit" name="submit" Value="Trimite">
        </form>
        <br/>
    </body>
</html>

<?php

require 'autoload.php';

if (isset($_POST["submit"])) {

    $totalParkingSpaces = $_POST["totalParkingSpaces"];
    $totalActions = $_POST["totalActions"];

//// Check existing and format posts 
    
    $validation = new Validation();
    $validation->addValidation($totalActions);
    $validation->addValidation($totalParkingSpaces);

//// Instantiate class Parking  

    $parking = new Parking();
    $parking->setParkingSpaces($totalParkingSpaces);
    $parking->checkFullParkingSpaces($totalActions);

//// Save post data to xml file

    if ($parking->totalFreeParkingSpaces($totalActions) > 0) {

        $destination = 'xml/savedData.xml';
        $xml = simplexml_load_file($destination);
        $post = $xml->addChild('post');
        $post->addChild('totalFreeParkingSpaces', $parking->totalFreeParkingSpaces($totalActions));
        $post->addChild('totalEntries', $parking->getParkingEntries($totalActions));
        $post->addChild('totalCarsFromParking', $parking->totalCarsFromParking($totalActions));
        file_put_contents($destination, $xml->asXML());
    }
}

//// Display output from xml file

$output = simplexml_load_file('xml/savedData.xml');
$totalFreeParkingSpaces = [];
$totalEntries = [];
$totalCarsFromParking = [];

foreach ($output->post as $post) {

    $totalFreeParkingSpaces[] = $post->totalFreeParkingSpaces;
    $totalEntries[] = $post->totalEntries;
    $totalCarsFromParking[] = $post->totalCarsFromParking;
    
}

echo 'Free parking spaces sequence ' . implode(', ', $totalFreeParkingSpaces) . '<br/>';
echo 'Entries sequence ' . implode(', ', $totalEntries) . '<br/>';
echo 'Total cars from parking sequence ' . implode(', ', $totalCarsFromParking);
?>