<?php

function getLat($url) {

    $pattern = '/@[^"][0-9{.,-}]+/';
    
    if (preg_match($pattern, $url, $match)) {
        
        $str = substr($match[0], 1, -2);
        $coord = explode(",", $str);

        return $coord[0];
    }
}
function getLong($url) {

    $pattern = '/@[^"][0-9{.,-}]+/';
    
    if (preg_match($pattern, $url, $match)) {
        
        $str = substr($match[0], 1, -2);
        $coord = explode(",", $str);

        return $coord[1];
    }
}
