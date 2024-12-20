<?php

/**
 * Kreiraj niz koji sadrži podatke o studentima
 * 
 * 1. Filtriraj studente koji imaju prosječnu ocjenu iznad 3.5
 * 2. Izračunaj prosječnu ocijenu svih studenata koji su prošli filtraciju
 * 3. Odredi broj studenata u svakoj godini studija
 */

 $studenti = [
    ["ime" => "Ana", "prezime" => "Anić", "godina" => 1, "prosjek" => 4.2],
    ["ime" => "Ivan", "prezime" => "Ivanić", "godina" => 2, "prosjek" => 3.1],
    ["ime" => "Marko", "prezime" => "Mrkovski", "godina" => 3, "prosjek" => 3.7],
    ["ime" => "Lucija", "prezime" => "Lucić", "godina" => 1, "prosjek" => 4.8],
    ["ime" => "Hrvoje", "prezime" => "Hrvatko", "godina" => 2, "prosjek" => 4.0],
 ];

// 1. Filtriraj studente koji imaju prosječnu ocjenu iznad 3.5
 $izvrsniStudenti = array_filter($studenti, function($student){
    return $student["prosjek"] > 3.5;
 });

 print_r($izvrsniStudenti);

 // 2. Izračunaj prosječnu ocijenu svih studenata koji su prošli filtraciju
 $arrayProsjeka = array_column($izvrsniStudenti, "prosjek");
$prosjekIzvrsnihStudenata = array_sum($arrayProsjeka) / count($izvrsniStudenti);
print_r($prosjekIzvrsnihStudenata);

// 3. Odredi broj studenata u svakoj godini studija
$arrayGodina = array_column($studenti, "godina");
$brojStudenataUSvakojGodini = array_count_values($arrayGodina);
print_r($brojStudenataUSvakojGodini);
