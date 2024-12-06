<?php

declare(strict_types=1);

//

class Car
{
    private string $brand;
    private string $model;

    public function __construct(string $brand, string $model)
    {
        
        $this->brand=$brand;
        $this->model=$model;
    }

}
$car=new Car("Audi","A4");

var_dump($car);

