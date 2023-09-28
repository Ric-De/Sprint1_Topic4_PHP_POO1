<?php

/* Exercise 1
Create an Employee class, define its name and salary as attributes. Define an initialize method that receives the name and salary as parameters. Create a second print method that prints the name and a message whether or not you have to pay taxes (if your salary is over 6000, you pay taxes). */

class Employee{
    public $name;
    public $salary;

    //Exercise didn't ask for a constructor. Probably the objective is to use the default constructor of the language with the initialize method.

    /* public function __construct($name, $salary){
        $this->name = $name;
        $this->salary = $salary;
    } */

    //Maybe this function is to think about how the constructor works.
    public function initialize($name, $salary){
        $this->name = $name;
        $this->salary = $salary;
    }

    public function print(){
        if ($this->salary > 6000){
            $result = $this->name. " has to pay taxes.";
        } else{
            $result = $this->name. " does not have to pay taxes.";
        }
        echo $result;
    }
}

//Instantiate object and call methods. Exercise didn't ask to instantiate and call methods. This only for testing purposes.

/* $employee1 = new Employee("John", 5000);
$employee1 -> initialize("Pedro", 5000);
$employee1 -> print();

echo "<br>";

$employee2 = new Employee("Jane", 10000);
$employee2 -> initialize("Jane", 10000);
$employee2 -> print(); */

?>