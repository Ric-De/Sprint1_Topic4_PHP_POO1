<?php

class Movie{
    private $name;
    private $duration;
    private $director;

public function __construct($name, $duration, $director) {
    $this -> name = $name;
    $this -> duration = $duration;
    $this -> director = $director;
}

public function getName(){
    return $this->name;
}

public function getDuration(){
    return $this->duration;
}

public function getDirector(){
    return $this->director;
}

}

?>