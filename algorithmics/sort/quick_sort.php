<?php

$array = [16, 5, 12, 7, 19, 18, 1, 30];

function quickSort($array)
{
    $length = count($array);
    if (!$length)
    {
        return $array;
    }

    $k = $array[0];
    $x = $y = array();

    for ($i = 1;$i < $length;$i++)
    {
        if ($array[$i] <= $k)
        {
            $x[] = $array[$i];
        }
        else
        {
            $y[] = $array[$i];
        }
    }
    // var_dump(quickSort($x));
    // die();
    return array_merge(quickSort($x) , array($k) , quickSort($y));
}

var_dump(quickSort($array));