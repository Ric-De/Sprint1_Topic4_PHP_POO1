<?php

/* Exercise 2
Write a program that defines a Shape class with a constructor that receives width and height as parameters. It defines two subclasses; Triangle and Rectangle extends Shape and respectively calculates the area of its geometric shape. */

class Shape{
    public $width;
    public $height;

    public function __construct($width, $height){
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea(){
        $result = $this->width * $this->height;
        return $result;
    }
}

class Triangle extends Shape{
// Area = (1/2) * width * height

    public function calculateArea(){
        $result = 0.5 * $this->width * $this->height;
        return $result;
    }
}

class Rectangle extends Shape{
// Area = width * height
}

//Exercise didn't ask to instantiate and call methods. This only for testing purposes.

/* 
$triangle = new Triangle(3, 4);
$rectangle = new Rectangle(5, 5);

echo $triangle -> calculateArea();
echo '<br>';
echo $rectangle -> calculateArea();
 */

?>