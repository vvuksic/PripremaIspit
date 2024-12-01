<?php
$i=49;
do
{
echo $i;
$i--;
}
while ($i>=13);

/*Napišite kratki PHP kod koji koristi While petlju za ispisivanje neparnih brojeva od 14 do 34.*/

$i=14;
while ($i<=34){
    if ($i%2!==0)
    {
    print $i .' ';
    }
    $i++;
}

/*Napišite kratki PHP kod koji 
koristi forpetlju za ispis svih brojeva od 1-100 koji su djeljivi sa 7 ili 9 ali preskoči brojeve 63, 70 i 90.*/

for ($i=1;$i<=100;$i++){
    if ((($i%7===0)||($i%9===0))& (($i<>63)& ($i<>70)&($i<>90)))
    {
        echo $i . " ";
    }
}

/*Napišimo funkciju u PHP-u koja prima dva parametra:
•
broj brojeva koji se generiraju i s kojim brojem bi trebali biti djeljivi
•
dodaje generirane brojeve na kraj polja.*/

$brojevi=[10,20,30];

function dodajBrojeve (int $brojBrojeva, int $djeljenik, array $brojevi){
    for ($i=1; $i<=$brojBrojeva;$i++){

        $brojevi[]=$djeljenik*$i;
    }
    return $brojevi;

}
$novibrojevi=dodajBrojeve(4,8,$brojevi);
print_r($novibrojevi);