<?php

$filename = "names.txt";
// Otvori datoteku za čitanje
$handle = fopen($filename, "r") or die("Ne mogu otvoriti datoteku: $filename");
echo fread($handle, filesize($filename));
fclose($handle);

// Otvori datoteku za pisanje
// $handle = fopen($filename, "a");
// fwrite($handle, PHP_EOL . "John Doe");
// fclose($handle);

// Otvori datoteku za čitanje
$handle = fopen($filename, "r") or die("Ne mogu otvoriti datoteku: $filename");
$names = [];
while (!feof($handle)) {
    $name = fgets($handle);
    if (trim($name)) {
        $names[] = $name;
    }
}
fclose($handle);
var_dump($names);