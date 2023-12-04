<?php

function hasMatchedParenthesis(string $string) {
    $stack = [];

    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];

        if ($char == '(') {
            $stack[] = '(';
        } 

        if ($char == ')') {
            if (count($stack) == 0) {
                return 0;
            } else {
                $char = $stack[count($stack) - 1];
                
                if ($char == '(') {
                    array_pop($stack);
                } else {
                    return 0;
                }
            }
        }
    }

    if (count($stack) == 0) {
        return 1;
    } 
    
    return 0;
}

$string = "((()(())()))";

if (hasMatchedParenthesis($string) == 0) {
    echo "Invalid";
} else {
    echo "Valid";
}