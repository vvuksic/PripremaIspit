
<?php
include_once 'constants.php';
$handle = fopen(STUDENT_FILE, "r") or exit ("Ne mogu otvoriti datoteku ili datoteka ne postoji!");
$studenti=[];
while (!feof($handle)){
    $student=fgets($handle);
    if (trim($student)) {
        $podaci=explode(";",$student);
   
        $studenti[]=[
            "ime"=>$podaci[0],
            "prezime" => $podaci[1],
            "godine"=>$podaci[2],
        
        ];

    }
};
fclose($handle);

print_r($studenti);
