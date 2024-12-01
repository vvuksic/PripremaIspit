<?php

$a = 10;
$b = 20;

echo $a % $b; // 10
echo $a += $b; // 30
echo $a; // 30
var_dump($a.$b); // 3020
var_dump($a); // int(30)

$b++; // $b = $b + 1
var_dump($b); // 21

$c = $b++; // $b = 22, $c = 21
$c = ++$b; // $b = 23, $c = 23

// Operatori usporedbe
$x = 0;
$y = "10";

var_dump($x == $y); // true
var_dump($x === $y); // false
var_dump($x != $y); // false
var_dump($x <> $y); // false
var_dump($x !== $y); // true
var_dump($x < $y); // false

// Operatori logički
var_dump(!$x);
var_dump($x && $y);
var_dump($x || $y);

// Zadatak 1
$a = 30;
$b = 20;
$c = 10;
// rezultat true/false 
//(ako je b između a i c) = true
// (ako b nije između a i c) = false
var_dump(($b > $a && $b < $c) || ($b < $a && $b > $c));


// Referenca

$a = 10;
$b = &$a; // 10
$a = 15;
$b = 20;
echo $a; // 20

$ime = "Saša";
echo strtoupper($ime); // SAŠA
echo mb_strtoupper($ime, "utf-8"); // SAŠA

echo htmlspecialchars("<script>alert(\" DGSDGSDGSDG \")</script>");
