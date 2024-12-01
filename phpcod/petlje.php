<?php
$i=1;
while ($i<=10)
{


    echo $i . " ";
$i++;
}

for ($i=1;$i<100;$i++){
   
    if($i%2==0){
        echo $i . ' ';
}
}

$names=["Vesna", "Ivana", "Marko", "Jospi", "goran"];

foreach($names as $key=>$name){
    echo $key . ' -  ' . $name . ' ';
}