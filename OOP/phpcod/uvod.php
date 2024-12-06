<?php

// Nacrt objekta (Rszred, Klasa)

class Car{
 // Svojstva (Atributi)

 public $brand;
 public $model;
 



}

$car = new Car("Audi","a6");
$car->brand='Audi';

$car1 = new Car("bmw","x5");
$car1->brand='BMW';

$car2=$car1;
$car2->brand='x5';

$car3= clone $car1;
$car3->brand='citroen';


var_dump ($car, $car1, $car2, $car3);
   
