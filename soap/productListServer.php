<?php

require_once 'lib/nusoap.php';
//ini_set('display_errors', 0);
include 'sql/config.php';

function getProd($category = null) {

    $arr = array(
                'books'=>"The WordPress Anthology", "PHP Master: Write Cutting Edge Code");


    return $arr;

//    global $db;
//    $sql = "SELECT task.*, user.name AS user_name,operator.name AS operator_name, team.name AS team_name FROM task
//        LEFT JOIN user ON user.id = task.id_user 
//        LEFT JOIN user AS operator ON operator.id = task.id_operator 
//        LEFT JOIN team ON team.id = user.id_team
//        WHERE task.d=0";
//
//    $res = $db->get_results($sql);
//
//
//    return $res;
}

//$test = getProd();
//echo '<pre>';
//var_dump($test);
//echo '</pre>';
$server = new soap_server();
$server->register("getProd");
$server->service(file_get_contents("php://input"));
//echo '<pre>';
//var_dump($server->register("getProd"));
//echo '</pre>';