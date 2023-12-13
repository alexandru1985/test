<?php

function groupByOwners(array $files) : array
{
    $result = [];

    foreach ($files as $key=> $value) {
        $result[$value][]=$key;
    }

    return $result;
}

$files = array
(
    "Input.txt" => "Randy",
    "Code.py" => "Stan",
    "Output.txt" => "Randy"
);

var_dump(groupByOwners($files));