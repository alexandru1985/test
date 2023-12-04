<?php

$array = array('a', 'b', array(array(array('x'), 'y', 'z')), array(array('p')));
echo '<pre>';
var_dump($array);
echo '</pre>';

function array_flatten($array) { 
  if (!is_array($array)) { 
    return false; 
  } 
  $result = array(); 
  foreach ($array as $key => $value) { 
    if (is_array($value)) { 
      $result = array_merge($result, array_flatten($value)); 
    } else { 
      $result = array_merge($result, array($key => $value));
    } 
  } 
  return $result; 
}
$res = array_flatten($array);
echo '<pre>';
var_dump($res);
echo '</pre>';
die();