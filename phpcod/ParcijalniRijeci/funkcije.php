<?php
include_once "konstante.php";

function otvoriDatoteku ():array {
    if (!file_exists(RIJECI)){
        return [];
    }
    $rijec=file_get_contents(RIJECI);
    return json_decode($rijec,true);
}


function zapisiDatoteku($rijec):void{
    $jsonRijec=json_encode($rijec, JSON_PRETTY_PRINT);
    $zapis=file_put_contents(RIJECI, $jsonRijec);
  
}

function dodajSlog (string $rijec, int $brojslova, int $suglasnik, int $samoglasnik):void{
 $rijeci=otvoriDatoteku();
 $rijeci[]=[
    "rijec"=>$rijec,
    "brojslova"=>$brojslova,
    "brsugl"=>$suglasnik,
    "brsamo"=>$samoglasnik

 ];
    zapisiDatoteku($rijeci);
}



function brojiSlova(string $rijec):void{
    $brojslova=strlen($rijec);
    $slova=[];
    $samoglasnik=0;
    $suglasnik=0;
    $slova=str_split($rijec,1);
    foreach ($slova as $slovo){
       if (mb_strtoupper($slovo) == 'A' OR mb_strtoupper($slovo) == 'E' or mb_strtoupper($slovo) == 'I' or mb_strtoupper($slovo) == 'O' or mb_strtoupper($slovo) == 'U'){
        $samoglasnik +=1;
       }
       else
       {
        $suglasnik +=1;
       }
      
       }
       dodajSlog($rijec,$brojslova,$suglasnik,$samoglasnik);
}
?>