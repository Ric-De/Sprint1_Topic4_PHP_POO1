<?php

class shape{
    public $width;
    public $height;

    public function __construct($width, $height){
        $this -> width = $width;
        $this -> height = $height;
    }

    public function calculateArea(){
        $result = $this -> width * $this -> height;
        return $result;
    }
    
}

class Triangle extends shape{
    // Area = (1/2) * height * width

    public function calculateArea(){
        $result = 0.5 * $this -> width * $this -> height;
        return $result;
    }
}

class Rectangle extends shape{
// Area = width * height
}

//Exercise didn't ask to instantiate and call methods. This is only for demonstration purposes.

/* 
$triangle = new Triangle(5, 7);
$rectangle = new Rectangle(4, 4);

echo $triangle->calculateArea();
echo "<br>";
echo $rectangle->calculateArea();
 */
?>