<?php

function countdown(int $number): int {
    if ($number === 0) {
        return 0;
    }
    
    return countdown($number - 1);
}

countdown(3);



function faktorijal(int $number): int {
    if ($number === 0) {
        return 1;
    }
    
    return $number * faktorijal($number - 1);
}

faktorijal(3); // 6
/*
faktorijal(1) -> vrati 1
faktorijal(2) -> vrati 2 * 1 = 2
faktorijal(3) -> vrati 3 * 2 = 6
*/
