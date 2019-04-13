<?php
require_once "lib/nusoap.php";
$client = new nusoap_client("http://localhost/test/soap/productListServer.php");

$error = $client->getError();
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}

$result = $client->call("getProd", array("category" => "books"));
//echo '<pre>';
//var_dump($result);
//echo '</pre>';
if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
}
else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    }
    else {
//        foreach ($result as $key => $value) {
//            echo $value['user_name'];
//        }
        
        foreach ($result as $key => $value) {
            echo $value;
        }
        
    }
}

// show soap request and response
echo "<h2>Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";