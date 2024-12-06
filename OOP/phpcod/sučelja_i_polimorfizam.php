<?php

interface Shape {
    public function getArea(): float;
}

class Circle implements Shape {
    private float $radius;

    public function __construct(float $radius) {
        $this->radius = $radius;
    }

    public function getArea(): float {
        return M_PI * $this->radius ** 2;
    }
}

class Rectangle implements Shape {
    private float $width;
    private float $height;

    public function __construct(float $width, float $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(): float {
        return $this->width * $this->height;
    }
}

function printArea(Shape $shape) {
    echo 'Površina: ' . $shape->getArea() . PHP_EOL;
}

$circle = new Circle(5);
$rectangle = new Rectangle(3, 4);

printArea($circle);
printArea($rectangle);
