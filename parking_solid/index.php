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
                    <td><input type="text" name="totalActionsX"></td>               
                </tr>
            </table>
            <input type="submit" name="submit" value="Trimite">
        </form>
        <br/>
    </body>
</html>

<?php

require 'autoload.php';

if (isset($_POST["submit"])) {

    $totalParkingSpaces = $_POST["totalParkingSpaces"];
    $pollutionBuffer = $_POST["pollutionBuffer"];    
    $totalActionsX = $_POST["totalActionsX"];

//// Check existing and format posts 
    
    $format = new Format();
    $validation = new Validation($format);
    
    $validation->checkField($totalParkingSpaces);
    $validation->checkField($totalActionsX);
    $validation->checkField($pollutionBuffer);
 
    $format->patternDigits($totalActionsX);
    $format->patternDigits($pollutionBuffer);

//// Set parking spaces and check free of them

    $parking = new Parking();
    $parking->setParkingSpaces($totalParkingSpaces);
    $parking->checkFullParkingSpaces($totalActionsX);

//// Save post data to xml file

    if ($parking->totalFreeParkingSpaces($totalActionsX) >= 0) {

        $xml = simplexml_load_file('xml/savedData.xml');
        $post = $xml->addChild('post');
        $post->addChild('totalFreeParkingSpaces', $parking->totalFreeParkingSpaces($totalActionsX));
        $post->addChild('totalEntries', $parking->getParkingEntries($totalActionsX));
        $post->addChild('totalCarsFromParking', $parking->totalCarsFromParking($totalActionsX));
        $post->addChild('pollutionBuffer', $parking->getPollutionBuffer($pollutionBuffer));
        file_put_contents('xml/savedData.xml', $xml->asXML());
    }
}

//// Output data from xml file

$output = simplexml_load_file('xml/savedData.xml');

$totalFreeParkingSpaces = [];
$totalEntries = [];
$totalCarsFromParking = [];
$pollutionBuffer = [];

foreach ($output->post as $post) {

    $totalFreeParkingSpaces[] = $post->totalFreeParkingSpaces;
    $totalEntries[] = $post->totalEntries;
    $totalCarsFromParking[] = $post->totalCarsFromParking;
    $pollutionBuffer[] = $post->pollutionBuffer;
}

echo 'Free parking spaces sequence ' . implode(', ', $totalFreeParkingSpaces) . '<br/>';
echo 'Entries sequence ' . implode(', ', $totalEntries) . '<br/>';
echo 'Total cars from parking sequence ' . implode(', ', $totalCarsFromParking). '<br/>';
echo 'Pollution Buffer sequence ' . implode(', ', $pollutionBuffer);
?>