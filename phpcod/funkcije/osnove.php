<?php
declare(strict_types=1);

// 1. Zadatak
// Napiši funkciju koja vraća neki tekst.
// Pozovite funkciju i vraćenu vrijednost spremite u varijablu.
// Ispišite vrijednost varijable.

function vratiTekst(): string {
    return 'Ovo je neki tekst';
}

$tekst = vratiTekst();
echo $tekst;

// 2. Zadatak
// Napiši funkciju koja ima dva parametra (name, surname). 
// Funkcija treba konkatenirati name i surname i zapisati u lokalnu varijablu.
// Zatim vrijednost u lokalnoj varijabli treba pretvoriti u velika slova.
// Funkcija treba vratiti vrijednost lokalne varijable.
// Pozovite funkciju i spremite vraćenu vrijednost u varijablu.
// Ispišite vrijednost varijable.
$age = 30;
function fullName(string $name, string $surname): string {
    $age = 40;
    $result = $name . ' ' . $surname . ' ' . $GLOBALS['age'];
    return mb_strtoupper($result);
}

$fullName = fullName('John', 'Doe');
echo $fullName;

$fullName = fullName(surname:'Jane', name:'Doe');
echo $fullName;


// 3. Zadatak Callback funkcija
$even = array_filter([1, 2, 3, 4, 5], function($value) {
    return $value % 2 === 0;
});

// Custom array_filter funkcija bez korištenja callback funkcije
function customArrayFilter(array $array): array {
    $result = [];
    foreach ($array as $value) {
       if ($value % 2 === 0) {
           $result[] = $value;
       }
    }
    return $result;
}

// Custom array_filter funkcija sa korištenjem callback funkcije
function customArrayFilterCallback(array $array, callable $callback): array {
    $result = [];
    foreach ($array as $value) {
       if ($callback($value)) {
           $result[] = $value;
       }
    }
    return $result;
}

$a=[2,3,4,5,6];

$b=customArrayFilterCallback($a,function($value){
    return $value>2;
});

print_r ($b);