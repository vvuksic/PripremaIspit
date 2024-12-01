<?php
Declare(strict_types=1); 
/*Napisati PHP skriptu koja analizira niz brojeva i ispisuje rezultate analize. Analiza treba uključiti:
Pronalaženje parnih i neparnih brojeva: Skripta treba razdvojiti parne i neparne brojeve iz originalnog niza te ih smjestiti u dva odvojena niza.
Izračunavanje sume svih brojeva: Skripta treba izračunati ukupnu sumu svih brojeva u nizu.
Pronalaženje najvećeg broja: Skripta treba pronaći i ispisati najveći broj u nizu.
Filtriranje i ispis brojeva većih od prosječne vrijednosti: Izračunati prosječnu vrijednost svih brojeva u nizu, a zatim ispisati sve brojeve iz niza koji su veći od te prosječne vrijednosti.
Upute:
Definirati početni niz s najmanje 10 proizvoljnih brojeva. $brojevi = [3, 7, 2, 8, 1, 4, 6, 9, 5, 10];
Koristiti petlje (npr. foreach ili for) za iteriranje kroz niz.
Koristiti if-else strukture za provjeru uvjeta (npr. je li broj paran ili neparan).
Koristiti odgovarajuće funkcije za rad s nizovima gdje je to potrebno.*/

$brojevi = [3, 7, 2, 8, 1, 4, 6, 9, 5, 10];
$parni=[];
$neparni=[];
$veciodprosjeka=[];
foreach ($brojevi as $broj){
    if ($broj%2==0)
    {
        $parni[]=$broj;
    }
    else
    {
        $neparni[]=$broj;
    }
}   
//suma svih brojeva u nizu    
$suma =array_sum($brojevi);
echo "suma svih brojeva je $suma";
//broj članova niza
$i=count($brojevi);
echo "Broj članova u nizu je $i";
//max broj u nizu
$max=max($brojevi);
echo "Najveću broj je $max";
//prosjek
$prosjek=$suma/$i;
echo "Prosjek je $prosjek";
//veći od prosjeka

$veciodprosjeka=array_filter($brojevi,function($broj) use ($prosjek){
    return $broj>$prosjek;
});
echo "Parni"; 
print_r ($parni);
echo "Neparni"; 
print_r($neparni);
echo "Veci od prosjeka"; 
print_r( $veciodprosjeka);
