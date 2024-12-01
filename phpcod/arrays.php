<?php

// Kreiraj niz koji sadrži imena pet voćaka. 
// Dodaj na kraj niza dvije nove voćke korištenje uglatih zagrada i ugrađene php array funkcije
// Izbriši prvi element u nizu

$fruits = ["jabuke", "banane", "naranče", "kiwi", "mango"];

// dodavanje
$fruits[] = "ananas";
array_push($fruits, "grožđe");

// brisanje
unset($fruits[0]);
array_shift($fruits);

print_r($fruits);

// Kreiraj dva niza koji sadrže po tri broja.
// Spoji ova dva niza u jedan niz
$prvi = [2,3,7];
$drugi = [2,5,9];
$spojeniNiz = array_merge($prvi, $drugi);
$spojeniNiz = [...$prvi, ...$drugi];
print_r($spojeniNiz);


// Kreiraj niz koji sadrži 5 ocjena. Izračunaj prosječnu ocjenu.
$ocjene = [2,4,5,3,4];
$rezultat = array_sum($ocjene) / count($ocjene);
print_r($rezultat);

// Kreiraj niz s 10 brojeva i izdvoji sve brojeve veće od 5 u novi niz

$brojevi = [1,8,6,4,8,3,7,1,0,5];
$brojeviVeciOdPet = array_filter($brojevi, function($broj){
    return $broj > 5;
});
$reindeksiraniBrojevi = array_values($brojeviVeciOdPet);
print_r($reindeksiraniBrojevi);

