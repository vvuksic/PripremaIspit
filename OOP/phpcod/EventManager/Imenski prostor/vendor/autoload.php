<?php
spl_autoload_register(function($class){
   $prefix="App\\";

   $base_dir = __DIR__ . "/../src/"; 

   $len=strlen($prefix);
   if (strncmp($prefix, $class,$len)!==0){
        return; //ne die, zaustavlja samo za prvi use koji nije jednak i ide dalje
   }

   $relative_class=substr($class,$len); //izostavlja App

   $file = $base_dir . str_replace("\\", "/", $relative_class) . ".php"; // replace backward slash / dobijemo putanju do naše datoteke

   //autoloader provjeri da li datoteka postoji i uključi datoteku (mora provjeriti daa li postoji, autoloader ne smije zaustaviti izvođenje, a ako datoteke nama pukne autoloader jer je require)
   if (file_exists($file)){
    require $file;   
   }

});
