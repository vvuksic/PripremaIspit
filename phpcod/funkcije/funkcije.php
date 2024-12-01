<?php
Declare(strict_types=1);
function vratiFullName(string $ime, string $prezime):string
{
    $fulName= $ime ." ".$prezime;

    return mb_strtoupper($fulName);
}

$vratiFullName=vratiFullName(prezime:"Vesna", ime:"Vukšić");

echo $vratiFullName ." ";

//Callable

function array_f(array $a, callable $callback): array{
    $newArray=[];
    foreach ($a as $key => $value){
        if ($callback($value)){
            $newArray[ $key]=$value;
        }
    }
return $newArray;
}

$a=array_f([5,10,15], function($value){
    return $value >5;
});

print_r ($a);