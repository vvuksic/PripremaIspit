<?php
function addNumber  (float $broj):float{
    static $zbroj=0;
    $zbroj+=$broj;
    return $zbroj;

}
echo addNumber(5);
echo addNumber(5);
echo addNumber(5);
$funkcija='addNumber';
echo $funkcija(258.5);