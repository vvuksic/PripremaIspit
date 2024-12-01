<?php
include_once "konstante.php";
function ucitajDatoteku():array{
    if(!file_exists(DATOTEKA)){
        return [];
    }
    $sadrzaj=file_get_contents(DATOTEKA);
    return json_decode($sadrzaj,true);
}

function zapisiDatoteku($sadrzaj):void{
    $jsonSadrzaj=json_encode($sadrzaj, JSON_PRETTY_PRINT);
    $zapis=file_put_contents(DATOTEKA, $jsonSadrzaj);
  
}

function dodajSlog (string $ime, string $jelo):void{
 $sadrzaj=ucitajDatoteku();
 $sadrzaj[]=[
    "ime"=>$ime,
    "jelo"=>$jelo
 ];
    zapisiDatoteku($sadrzaj);
}
?>