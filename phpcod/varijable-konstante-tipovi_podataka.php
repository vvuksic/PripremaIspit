<?php

// varijable
$ime;
// var_dump($ime);

$ime = "Ivan";
var_dump($ime);

// konstante
define("PI", 3.14);
var_dump(PI);

// tipovi podataka
// integer
$int_dek = 123;
var_dump($int_dek);
$int_oct = 0123;
var_dump($int_oct);
$int_hex = 0x1A;
var_dump($int_hex);

// float
$float_var = 1.23;
var_dump($float_var);

// string
$string_var = "Ovo je string \"test\" Ovo je novi red";
echo $string_var;

$ime = "Ivan";
$prezime = "Ivić";
$ime_prezime = $ime . " " . $prezime; // konkatenacija
$ime_prezime = "$ime $prezime"; // interpolacija
echo $ime_prezime;

// boolean
$bool_true = true;
$bool_false = false;
echo $bool_true;
echo (int)$bool_false;
0 == "0"; // true
0 === "0"; // false
null == false; // true
null === false; // false

var_dump(0.33 == 0.333333);

?>