<?php

class Car
{
    private string $brand;
    private string $model;

    public function __construct(string $brand, string $model)
    {
        
        $this->brand=$brand;
        $this->model=$model;
    }

    public function getBrand():string{
        return $this->brand;
    }

    public function setBrand(string $brand):void{
        $this->brand=$brand;
    }
    public function getModel():string{
        return $this->model;
    }

}

$car=new Car("Audi","A4");
var_dump($car->getBrand());

$car1=new Car("BMW","X5");
var_dump($car1->getBrand());

