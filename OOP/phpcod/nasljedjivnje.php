<?php
class Osoba 
{
protected string $ime;
protected string $prezime;

public function __construct(string $ime, string $prezime)
{
    $this->ime=$ime;
    $this->prezime=$prezime;
}

public function __toString()
{
    return $this->ime . " ". $this->prezime;
}

}

class Student extends Osoba {
        private string $jmbag;

        public function __construct(string $ime, string $prezime, string $jmbag)
{       
    parent::__construct($ime,$prezime);
    $this->jmbag=$jmbag;

}
public function __toString()
{
    return parent::__toString(). "-".$this->jmbag;
}

}

$student=new Student("Marko", "Marković", "123454");
var_dump($student);


echo $student;
